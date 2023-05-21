let current_word = "";
let current_try = 1;
let pwords = word_list.slice();

//document.querySelector("#game-id").innerText = `${arm_index}◹`;
document.addEventListener("mousedown", handle_click);
document.addEventListener("keydown", handle_key);
document.querySelector("#suggestion").addEventListener("click", generate_suggestion);

function handle_key(e) {
    let key = "";
    switch (e.keyCode) {
        case 65:
            key = "ա";
            break;
        case 66:
            key = "պ";
            break;
        case 67:
            key = "գ";
            break;
        case 68:
            key = "տ";
            break;
        case 69:
            key = "է";
            break;
        case 70:
            key = "ֆ";
            break;
        case 71:
            key = "կ";
            break;
        case 72:
            key = "հ";
            break;
        case 73:
            key = "ի";
            break;
        case 74:
            key = "ճ";
            break;
        case 75:
            key = "ք";
            break;
        case 76:
            key = "լ";
            break;
        case 77:
            key = "մ";
            break;
        case 78:
            key = "ն";
            break;
        case 79:
            key = "ո";
            break;
        case 80:
            key = "բ";
            break;
        case 81:
            key = "խ";
            break;
        case 82:
            key = "ր";
            break;
        case 83:
            key = "ս";
            break;
        case 84:
            key = "դ";
            break;
        case 85:
            key = "ը";
            break;
        case 86:
            key = "ւ";
            break;
        case 87:
            key = "վ";
            break;
        case 88:
            key = "ց";
            break;
        case 89:
            key = "ե";
            break;
        case 90:
            key = "զ";
            break;
        case 191:
            key = "ծ";
            break;
        case 190:
            key = "ղ";
            break;
        case 188:
            key = "շ";
            break;
        case 222:
            key = "փ";
            break;
        case 186:
            key = "թ";
            break;
        case 221:
            key = "ջ";
            break;
        case 219:
            key = "չ";
            break;
        case 61:
            key = "ժ";
            break;
        case 173:
            key = "ռ";
            break;
        case 50:
            key = "ձ";
            break;
        case 51:
            key = "յ";
            break;
        case 48:
            key = "օ";
            break;
        case 189:
            key = "ռ";
            break;
        case 187:
            key = "ժ";
            break;
    }
    if (e.keyCode == 8) { // delete key
        key = "delete";
    }
    else if (e.keyCode == 13 && current_word.length == 5) {
        key = "enter";
    } 
    if (key != "") process_entry(key);
}
function handle_click(e) {
    if (e.target.tagName != "BUTTON") return;
    process_entry(e.target.getAttribute("data-key"));
}
function process_entry(submission) {
    let elem;
    let info = document.querySelector(`#info${current_try}`);;
    switch (submission) {
        case "enter":
            if (current_word.length != 5) return;
            if (current_try > 7) return;
            validate_attempt(current_word, current_try);
            prune_pwords(current_word);
            current_try++;
            current_word = "";
            if (current_try != 7) {
                document.querySelector("#suggestion").setAttribute("data-state", "on");
            }
            else {
                document.querySelector("#suggestion").setAttribute("data-state", "off");
            }
            return;
        case "delete":
            if (current_word == "") return;
            elem = document.querySelector(`#w${current_try}c${current_word.length}`);
            if (elem != null) elem.innerText = "-";
            current_word = current_word.substring(0, current_word.length -1);
            info.setAttribute("data-state", "off");
            //document.querySelector("#warning").setAttribute("data-state", "off");
            document.querySelector("body").setAttribute("data-state", "open");
            return;
    }
    if (current_word.length == 5) return;    
    current_word += submission;
    elem = document.querySelector(`#w${current_try}c${current_word.length}`); 
    if (elem != null) elem.innerText = submission;
    // absent present correctt
    if (current_word.length == 5) {
        if (word_list.indexOf(current_word) != -1) {
            info.setAttribute("data-state", "on");
            info.setAttribute("href", `http://nayiri.com/search?query=${current_word}`);
            //document.querySelector("#warning").setAttribute("data-state", "off");
            document.querySelector("body").setAttribute("data-state", "open");
        }
        else {
            info.setAttribute("data-state", "off");
            //document.querySelector("#warning").setAttribute("data-state", "on");
            document.querySelector("body").setAttribute("data-state", "errored");
        }
    }
    else {
        info.setAttribute("data-state", "off");
    }
}
function validate_attempt(attempt_word, attempt_number) {
    if (word_list.indexOf(attempt_word) == -1){
//        let message = document.createElement("span");
//        message.setAttribute("class", "toast");
//        message.innerText = "Բառ չի";
//        document.querySelector("body").appendChild(message);
//
//        setTimeout(function(){
//        document.querySelector(".toast").remove();
//        },3000);
        for (let i = 5; i > 0; i--) {
            document.querySelector(`#w${current_try}c${i}`).innerText = "-";
        }
        current_word = "";
        current_try--;
        return;
    }
        
    let lb;
    let button;
    for (let i = 0; i < current_word.length; i++) {
        lb = document.querySelector(`#w${current_try}c${i + 1}`);
        button = document.querySelector(`[data-key="${lb.innerText}"]`);
        if (lb.innerText == word_list[answer][i]) {
            lb.setAttribute("data-state", "correct");
            button.setAttribute("data-state", "correct"); 
        }
        else if (word_list[answer].indexOf(lb.innerText) != -1) {
            lb.setAttribute("data-state", "present");
            if (button.getAttribute("data-state") != "correct")
                button.setAttribute("data-state", "present");
        }
        else {
            lb.setAttribute("data-state", "absent");
            button.setAttribute("data-state", "absent"); 
        }
    }
}
function generate_suggestion() {
    if (document.querySelector("#suggestion").getAttribute("data-state") == "off") return;
    if (current_try != 7) {
        let absent = "";
        let present = ['', '', '', '', ''];
        let correct = ['', '', '', '', ''];
        for (let i = 1; i < current_try; i++) {
            for (let j = 1; j <=5; j++) {
                let elem = document.querySelector(`#w${i}c${j}`);
                switch (elem.getAttribute("data-state")) {
                    case "absent":
                        absent += elem.innerText;
                        break;
                    case "present":
                        present[j - 1] += elem.innerText;
                        break;
                    case "correct":
                        correct[j - 1] += elem.innerText;
                        break;
                }
            }
        }
        let rStr = `([^${absent}:]{5})`;
        let regex = new RegExp(rStr, "g");
        let m;
        let d = [];
        do {
            m = regex.exec(word_list.join(':'));
            if (m != null)
                d.push(m[1]);
        } while (m);
        d2 = [];
        for (const k of d) {
            let to_include = true;
            for (let i = 0; i < k.length; i++) {
                if (correct[i] != '' && correct[i] != k[i]) {
                    to_include = false;
                }
            } 
            if (to_include) d2.push(k);
        }
        //for (
        // rStr = `([^${absent}:]{5})`;
        // regex = new RegExp(rStr, "g");
        // do {
        //     m = regex.exec(d.join(':'));
        //     d.push(m[1]);
        // } while (m);
        // debugger;
        if (d2.length == 0) 
            d2 = d;
        current_word = d2[Math.floor(Math.random()*d2.length)];
        current_word = pwords[Math.floor(Math.random()*pwords.length)];
        for (let i = 1; i <= 5; i++) {
            document.querySelector(`#w${current_try}c${i}`).innerText = current_word[i - 1];
        }

        let info = document.querySelector(`#info${current_try}`);;

        if (word_list.indexOf(current_word) != -1) {
            info.setAttribute("data-state", "on");
            info.setAttribute("href", `http://nayiri.com/search?query=${current_word}`);
            document.querySelector("#warning").setAttribute("data-state", "off");
        }
    }
}
function prune_pwords (current_word) {
    let q = word_list[answer];
    let absent = '';
    let correct = {};
    let transposed = {};
    let present = '';
    for (let i = 0; i < current_word.length; i++) {
        if (q.indexOf(current_word[i]) == -1) {
            absent += current_word[i];
        }
        else if (q[i] == current_word[i]) {
            correct[i] = current_word[i];
        }
        else {
            transposed[i] = current_word[i];
            present += current_word[i];
        }
    } 
    for (let i = pwords.length - 1; i > -1; i--) {
        try_delete(i, absent, correct, transposed, present);
    }
}
function try_delete(i, absent, correct, transposed, present) {
    for (let index in correct) {
        if (pwords[i][index] != correct[index]) {
            pwords.splice(i, 1);
            return;
        }
    }
    for (let index in transposed) {
        if (pwords[i][index] == transposed[index]) {
            pwords.splice(i, 1);
            return;
        }
    }
    for (let letter of absent) {
        if (pwords[i].indexOf(letter) != -1){
            pwords.splice(i, 1);
            return;
        }
    }
    for (let letter of present) {
        if (pwords[i].indexOf(letter) == -1) {
            pwords.splice(i, 1);
            return;
        }
    }
}
document.querySelector("body").focus();
