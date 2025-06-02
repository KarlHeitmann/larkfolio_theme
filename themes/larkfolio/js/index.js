document.addEventListener('DOMContentLoaded', function () {
  const button = document.querySelector('#load-posts-btn');
  const searchInput = document.querySelector('#search-term');
  const resultsContainer = document.querySelector('#prs-container-results');

  console.log("DOMContentLoaded!!!");

  if (!button || !resultsContainer) return;

  button.addEventListener('click', () => {
    const search = searchInput?.value || '';

    fetch('/wp-json/mytheme/v1/prs-html', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ search })
    })
    .then(res => res.json())
    .then(data => {
      resultsContainer.innerHTML = data.html || '<p>Error loading content.</p>';
    })
    .catch(err => {
      resultsContainer.innerHTML = '<p class="text-red-500">Request failed.</p>';
      console.error(err);
    });
  });
});
