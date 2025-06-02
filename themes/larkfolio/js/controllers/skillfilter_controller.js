import { Controller } from '/wp-content/themes/larkfolio/js/vendor/stimulus.js';

export default class extends Controller {
  static values = { id: Number }
  connect() { 
    this.state = 'off'
  }

  filter() {
    const search = this.state == 'off' ? this.idValue : '';
    console.log(this.state)
    fetch('/wp-json/mytheme/v1/prs-html', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ search })
    })
    .then(res => res.json())
    .then(data => {
      // resultsContainer.innerHTML = data.html || '<p>Error loading content.</p>';
      document.querySelector('#prs-container-results').innerHTML = data.html || '<p>Error loading content.</p>';
      this.element.classList.toggle('bg-gray-900');
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
