const carousel = document.getElementById('carousel');

// Get a list of image file names
fetch('images.json')
  .then(response => response.json())
  .then(data => {
    // Create a div for each image and append it to the carousel
    data.forEach(filename => {
      const div = document.createElement('div');
      div.innerHTML = `<img src="resimler/${filename}">`;
      carousel.appendChild(div);
    });

    // Use Intersection Observer API to lazy load images
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target.querySelector('img');
          img.src = img.dataset.src;
          observer.unobserve(entry.target);
        }
      });
    });

    // Observe each image in the carousel
    const images = carousel.querySelectorAll('img');
    images.forEach(img => {
      img.dataset.src = img.src;
      img.src = '';
      observer.observe(img.parentNode);
    });
  });
