

document.querySelectorAll(".catalog_categories-burger, .catalog_categories-heading").forEach(
  (item) => {
    item.addEventListener("click", () => {
      if (window.innerWidth <= 1000) {
        document.querySelector(".catalog_categories-list").classList.toggle(
          "catalog_categories-list--active"
        );
      }
    });
  }
);

document.querySelectorAll(".topbar_basket, .basket_close").forEach((item) => {
  item.addEventListener("click", () => {
    document.querySelector(".basket").classList.toggle("basket--active");
  });
});
