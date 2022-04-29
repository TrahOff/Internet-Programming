var words = [
    "трафик", "полощи", "продюсер", "грейпфрут", "вряд ли", "воображуля", "мозаика", "почерк", "бюллетень", "дуршлаг"
];

let correct = 0;
let wrong = 0;

function check(word) {
    let arr = false;
    let long = word.length;
    if (long > 0) {
        arr = word.split("\n");
    }
    for (let i = 0; i < 10; i++) {
        if (arr[i] == words[i]) {
            correct++;
        } else {
            wrong++;
        }
    }
    if (correct >= 6) {
        let audio = document.getElementById('good');
        audio.play();
        audio.volume = 0.3;
    } else {
        let audio = document.getElementById('bad');
        audio.play();
        audio.volume = 0.3;
    }
}

function play() {
    let audio = document.getElementById('audio');
    audio.play();
    audio.volume = 0.5;
}

function result() {
    let audio = document.getElementById('audio');
    audio.pause();
    audio.currentTime = 0;
    var res = document.getElementById('gamefield');
    var word = document.getElementById('answers');
    check(word.value);
    res.innerHTML = "";
    var corrects = "Правильные ответы: " + correct;
    var wrongs = "\nОшибки: " + wrong;
    let table = document.createElement('table');
    let tr = document.createElement('tr');
    let td = document.createElement('td');
    td.classList.add('res');
    td.innerHTML = "Ваши результаты:";
    tr.appendChild(td);
    td = document.createElement('td');
    td.classList.add('green');
    td.innerHTML = corrects;
    tr.appendChild(td);
    td = document.createElement('td');
    td.classList.add('red');
    td.innerHTML = wrongs;
    tr.appendChild(td);

    let link = 'gamePages/EndGame.php';
    let a = document.createElement('a');
    a.setAttribute('href', link);
    a.innerHTML = "Закончить";

    table.appendChild(tr);
    res.appendChild(table);
    res.appendChild(a);
}