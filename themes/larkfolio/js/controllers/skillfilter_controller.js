import { Controller } from '/wp-content/themes/larkfolio/js/vendor/stimulus.js';

export default class extends Controller {
  static values = { id: Number }
  connect() {
    console.log("SkillFilter from Stimulus!");
  }
  filter() {
    console.log("Filtering...");
    console.log(this.idValue)

    fetch('/wp-json/mytheme/v1/prs-html', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ search: this.idValue })
    })
    .then(res => res.json())
    .then(data => {
      // resultsContainer.innerHTML = data.html || '<p>Error loading content.</p>';
      document.querySelector('#prs-container-results').innerHTML = data.html || '<p>Error loading content.</p>';
    })
    .catch(err => {
      // resultsContainer.innerHTML = '<p class="text-red-500">Request failed.</p>';
      document.querySelector('#prs-container-results').innerHTML = '<p class="text-red-500">Request failed.</p>';
      console.error(err);
    });


  }
}
