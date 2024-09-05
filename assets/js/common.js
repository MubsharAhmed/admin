/**
 * @author Kishor Mali
 */

jQuery(document).ready(function () {
  jQuery(document).on("click", ".deleteManager", function () {
    var userId = $(this).data("managerid"),
      hitURL = baseURL + "deleteManager",
      currentRow = $(this);

    var confirmation = confirm(
      "Are you sure you want to delete this manager ?"
    );

    if (confirmation) {
      jQuery
        .ajax({
          type: "POST",
          dataType: "json",
          url: hitURL,
          data: { userId: userId },
        })
        .done(function (data) {
          console.log(data);
          currentRow.parents("tr").remove();
          if ((data.status = true)) {
            alert("Manager successfully deleted");
          } else if ((data.status = false)) {
            alert("Manager deletion failed");
          } else {
            alert("Access denied..!");
          }
        });
    }
  });

  jQuery(document).on("click", ".searchList", function () {});
});
