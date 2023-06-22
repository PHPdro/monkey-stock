function next() {

    var info = document.getElementById('info');
    var suppliers = document.getElementById('suppliers');

    info.style.display = 'none';
    suppliers.style.display = 'block';
}

function back() {

    var info = document.getElementById('info');
    var suppliers = document.getElementById('suppliers');

    info.style.display = 'block';
    suppliers.style.display = 'none';

}
