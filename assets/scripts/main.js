function sel(selector) {
  return document.querySelector(selector);
}
function selAll(selector) {
  return document.querySelectorAll(selector);
}

selAll(".catalog_categories-burger, .catalog_categories-heading").forEach(
  (item) => {
    item.addEventListener("click", () => {
      if (window.innerWidth <= 1000) {
        sel(".catalog_categories-list").classList.toggle(
          "catalog_categories-list--active"
        );
      }
    });
  }
);

