

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function () {
        $("#exportButton").click(function () {
            let table = document.getElementsByTagName("table");
            var fileName = $(this).data("fileName");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: fileName + '.xlsx',
                sheet: {
                    name: fileName
                }
            });
        });
    });
</script>
