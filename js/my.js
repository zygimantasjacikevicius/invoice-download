window.onload = function () {
    document.getElementById('button').onclick = duplicate;
    document.getElementById('button2').onclick = remove;


    var i = 0;
    var original = document.getElementById('main_field');
    var table = document.getElementById('table_main');


    function duplicate() {
        var len = table.rows.length;
        var clone = original.cloneNode(true); // "deep" clone
        clone.id = "duplicetor" + ++i; // there can only be one element with an ID

        for (let k = 0; k < clone.getElementsByTagName('input').length; k++) {
            var input = clone.getElementsByTagName('input')[k];
            input.name += len;

        }




        original.parentNode.appendChild(clone);
    }

    function remove() {
        var myobj = document.getElementById("duplicetor" + i);
        myobj.remove();
        --i;
    }


};

