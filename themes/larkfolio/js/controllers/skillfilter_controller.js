import { Controller } from '/wp-content/themes/larkfolio/js/vendor/stimulus.js';

export default class extends Controller {
  // static values = { id: Number }

  connect() { 
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
    console.log("this.filters: ", this.filters)
    fetch('/wp-json/mytheme/v1/prs-html', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ search })
    })
    .then(res => res.json())
    .then(data => {
      // resultsContainer.innerHTML = data.html || '<p>Error loading content.</p>';
      document.querySelector('#prs-container-results').innerHTML = data.html || '<p>Error loading content.</p>';
      currentTarget.classList.toggle('bg-gray-950');
      if (this.state == 'off') {
        this.state = 'on';
      } else {
        this.state = 'off';
      }
      console.log(this.element)
    })
    .catch(err => {
      // resultsContainer.innerHTML = '<p class="text-red-500">Request failed.</p>';
      document.querySelector('#prs-container-results').innerHTML = '<p class="text-red-500">Request failed.</p>';
      console.error(err);
    });
  }
}
