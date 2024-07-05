document.addEventListener("DOMContentLoaded", function () {
  const product = document.querySelectorAll(".grid-item");
  product.forEach((e) => {
      e.addEventListener("click", function () {
          const modalBody = document.querySelector(".modal-body");

          // 从服务器获取产品详细信息
          fetch(`../../customer/ProductDetails/index.php?id=${e.dataset.productid}`)
              .then((response) => {
                  if (!response.ok) {
                      throw new Error("Network response was not good " + response.statusText);
                  }
                  return response.text();
              })
              .then((data) => {
                  // 将获取到的内容插入到模态框的内容区域
                  modalBody.innerHTML = data;
                  // 调用函数来更新浮点值条
              })
              .catch((error) => {
                  console.error("There was a problem with the fetch operation:", error);
                  modalBody.innerHTML = "<p>Error loading content.</p>";
              });
      });
  });
});
