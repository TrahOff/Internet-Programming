var words = [
        "трафик", "полощи", "продюсер", "грейпфрут", "вряд ли", "воображуля", "мозаика", "почерк", "бюллетень", "дуршлаг"
    ],
    word = ["", "", "", "", "", "", "", "", "", ""];

let correct = 0;
let wrong = 0;

function check(word) {
    let flag = false;
    for (let i = 0; i < 10; i++) {
        if (word == words[i]) {
            flag = true;
            break;
        }
    }
    if (flag == true) {
        correct++;
    } else {
        wrong++;
    }

}

function result() {
    var res = document.getElementById('gamefield');
    for (let i = 0; i < 10; i++) {
        word[i] = document.getElementById('"' + i + 1 + '"');
        check(word[i]);
    }

    res.innerHTML = "";
    res.innerText = "ваши итоги\n" + "Правильные ответы: " + correct + "\nОшибки: " + wrong;
}