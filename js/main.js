const imageFolder = 'resimler/';
fetch(imageFolder)
  .then(response => response.text())
  .then(html => {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, 'text/html');
    const imageFiles = Array.from(doc.querySelectorAll('a[href$=".jpg"],a[href$=".png"],a[href$=".jpeg"],a[href$=".gif"]'))
      .map(link => link.getAttribute('href'));
    // Call the function to create the carousel with the list of image files
    createCarousel(imageFiles);
  });
