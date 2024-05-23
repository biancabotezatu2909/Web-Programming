var filter = "None";
var opt = "None";

function jsonParse(text) {
    let json;
    try {
        json = JSON.parse(text);
    } catch (e) {
        return false;
    }
    return json;
}

function get_filtered_by_model() {
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let table = cars.getElementsByTagName("table")[0];
            let oldTableBody = cars.getElementsByTagName("tbody")[0];
            let newTableBody = cars.createElement('tbody');

            let json = jsonParse(this.responseText);
            for (let i = 0; i < json.length; i++) {
                let car = json[i];
                let row = newTableBody.insertRow();
                Object.keys(car).forEach(function (key) {
                    let text;
                    let cell = row.insertCell();
                    text = car[key];
                    cell.appendChild(car.createTextNode(text));
                })
            }
            table.appendChild(newTableBody);
            oldTableBody.parentNode.removeChild(oldTableBody);
        }
    }

    ajax.open('POST', 'getCarsByModel.php', true);
    let model = car.getElementsByTagName("select")[0].value;
    let json = JSON.stringify({ 'model': model });
    ajax.send(json);

    setPrevious("Model", model);
}

function get_filtered_by_color() {
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let table = cars.getElementsByTagName("table")[0];
            let oldTableBody = cars.getElementsByTagName("tbody")[0];
            let newTableBody = cars.createElement('tbody');

            let json = jsonParse(this.responseText);
            for (let i = 0; i < json.length; i++) {
                let car = json[i];
                let row = newTableBody.insertRow();
                Object.keys(car).forEach(function (key) {
                    let text;
                    let cell = row.insertCell();
                    text = car[key];
                    cell.appendChild(car.createTextNode(text));
                })
            }
            table.appendChild(newTableBody);
            oldTableBody.parentNode.removeChild(oldTableBody);
        }
    }

    ajax.open('POST', 'getCarsByColor.php', true);
    let format = car.getElementsByTagName("select")[1].value;
    let json = JSON.stringify({ 'color': color });
    ajax.send(json);

    setPrevious("Color", color);
}

function setPrevious(filt, option) {
    car.getElementById("previous-filter").innerHTML = "Previously used: " + filter + " filter: " + opt;
    filter = filt;
    opt = option;
}
