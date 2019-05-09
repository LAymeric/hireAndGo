function downloadXls(){
    $.ajax({ url: 'http://localhost:8080/api/command/export',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                type: 'GET',
                dataType: "json",
                success : function(code, status){
                    downloadExcel(code)

                },

                error : function(result, status, error){
                    errorPopup()
                },

                complete : function(result, status){
                }

            });
}

function downloadExcel(file) {
    const linkSource = `data:application/vnd.ms-excel;base64,${file.base64}`;
    const downloadLink = document.createElement("a");
    const fileName = file.fileName;

    downloadLink.href = linkSource;
    downloadLink.download = fileName;
    downloadLink.click();
}