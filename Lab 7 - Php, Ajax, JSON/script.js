$(document).ready(function(){
    $("table").on('click', '.btnDelete', function () {
        let id = $(this).closest('tr')[0].cells[0].innerText;
        $.post("delete_cars.php",{'id': id});
        $(this).closest('tr').remove();
    });

    $("table").on('click', '.btnUpdate', function () {
        let tableId = $(this).closest('tr')[0].cells[0].innerText;
        let tableMake = $(this).closest('tr')[0].cells[1].innerText;
        let tableModel = $(this).closest('tr')[0].cells[2].innerText;
        let tableYear = $(this).closest('tr')[0].cells[3].innerText;
        let tableColor = $(this).closest('tr')[0].cells[4].innerText;
        $(".update_form #id").val(tableId);
        $(".update_form #make").val(tableMake);
        $(".update_form #model").val(tableModel);
        $(".update_form #year").val(tableYear);
        $(".update_form #color").val(tableColor);
        if($(".update_form").css("display") === "none")
            $(".update_form").css("display", "inline");
        else
            $(".update_form").css("display", "none");
    });
});
