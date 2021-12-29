let items = [];
let main = $("main");
let table = $("#TableBod");
let j = 0;


callJson();

async function callJson() {
  $.getJSON("./data/employees.json", function (data) {
    let i = 0;
    data.forEach((element) => {
      i++;
      let tr = document.createElement("tr");
      table.append(tr);
      let th = document.createElement("th");
      th.setAttribute("scope", "row");
      th.innerText = i;
      tr.append(th);
      for (const key in element) {
        let td = document.createElement("td");
        td.innerText = element[key];
        td.setAttribute("data-key", key);
        tr.append(td);
        td.addEventListener("click", editElement);
      }
    });
  });
}

async function editElement(e) {
  if (j < 1) {
    let a = document.createElement("button");
    a.innerText = "edit";
    let b = e.target;
    b.append(a);
    j++;
    a.addEventListener("click", ajaxTest);
  }
}

async function ajaxTest(e) {
  let a = e.target.parentElement;
  let b = $(a).attr("data-key");
  let c = a.innerText;
  //Deletes the edit from the inner text.
  let d = c.split("edit")[0];
  $.post("./data/employees.json", function (data) {
    data.forEach((element) => {
      for (const key in element) {
        if (key == b && d == element[key]) {
          let replaced = element[key];
          replacementInput(replaced, a, b);
        }
      }
    });
  });
}

async function replacementInput(replaced, parent, key) {
  parent.innerHTML = `<input data-key='${key}' data-old='${replaced}' type='text' name='replacer' id='replacer' value='${replaced}'><button id='changer'type='button'>change</button>`;
  let a = key;
  let b = $("#changer")[0];
  b.addEventListener("click", ajaxRe);
}

async function ajaxRe(e) {
  e.preventDefault();
let a = $("#replacer")[0];
let key = a.getAttribute("data-key")
let oldVal = a.getAttribute("data-old")
let fvalue= a.value;
// mental separation between json and values
let resquests =  new XMLHttpRequest();
resquests.open("POST", "./data/employees.json", true)
resquests.onload = function(){
  let resp = this.responseText
let json = JSON.parse(resp);

json.forEach(element => {
  for (const key in element) {
  if(element[key] === oldVal){
    console.log(element[key])
    element[key] = fvalue;
let k = JSON.stringify(json)
sendJson(k)
  }
  }
});
}
resquests.send();

}



async function sendJson(k){
  console.log(k)
  const changedObject = new XMLHttpRequest();
  changedObject.open("POST", "./modules/employees.php");
  changedObject.setRequestHeader("Content-Type", "application/json");
  changedObject.send(k)
  table.empty()
  callJson()
  j--
}

