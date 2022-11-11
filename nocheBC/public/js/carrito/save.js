(function ($) {
  $(document).ready(function () {
    alert("hola");
    let url = document.getElementById("url").value;
    console.log(url);
    let headers = { "Content-Type": "application/json;charset=utf-8" };
    $("body").on("click", "save", function () {
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      alert("carrito");
      $.ajax({
        url: `${url}apiCarrito/save`,
        headers: headers,
        type: "POST",
        data: JSON.stringify({ lista: carrito }),
        dataType: "json",
        success: function (data) {
          localStorage.setItem("carrito", JSON.stringify([]));

          alert("Items added");
        },
        error: function (e) {
          console.log(e.message);
        },
      });
    }); //end body
  });
})(jQuery);
