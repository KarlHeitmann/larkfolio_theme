import { Controller } from '/wp-content/themes/larkfolio/js/vendor/stimulus.js';

export default class extends Controller {
  // static values = { id: Number }
  static targets = [ "results" ]

  connect() { 
    console.log("Experience Filter Controller connected")
    this.filters = []
    this.state = 'off'
  }

  filter(event) {
    const itemId = event.state != 'off' ? event.params.itemId : '';
    const currentTarget = event.currentTarget

    if (this.filters.includes(itemId)) {
      // removes search from this.filters array      
      this.filters = this.filters.filter(item => item !== itemId)
    } else {
      this.filters.push(itemId)
    }
    const search = this.filters.join(',')
    currentTarget.classList.add('bg-yellow-500')
    fetch('/wp-json/larkfolio/v1/experiences-html', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ search })
    })
    .then(res => res.json())
    .then(data => {
      // resultsContainer.innerHTML = data.html || '<p>Error loading content.</p>';
      currentTarget.classList.remove('bg-yellow-500')
      this.resultsTarget.innerHTML = data.html || '<p>Error loading content.</p>';
      currentTarget.classList.toggle('bg-gray-950');
      if (this.state == 'off') {
        this.state = 'on';
      } else {
        this.state = 'off';
      }
    })
    .catch(err => {
      // resultsContainer.innerHTML = '<p class="text-red-500">Request failed.</p>';
      currentTarget.classList.remove('bg-yellow-500')
      this.resultsTarget.innerHTML = '<p class="text-red-500">Request failed.</p>';
    });

  }
}