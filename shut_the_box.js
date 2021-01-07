let dice_roll = null;

function roll_dice() {
  let first_roll = 1 + Math.floor(Math.random() * 6);
  let second_roll = 1 + Math.floor(Math.random() * 6);
  let sum = first_roll + second_roll;
  dice_roll = sum;
  return `${first_roll} + ${second_roll} = ${sum}`;
}

function roll_die() {
  const button = document.getElementsByTagName("input")[0];
  const span = document.getElementsByTagName("span")[0];
  span.innerHTML = roll_dice();
}

function roll_only_one() {
  let first_roll = 1 + Math.floor(Math.random() * 6);
  let dice_roll = first_roll;
  return `${first_roll}`;
}

function roll_one_die() {
  const button = document.getElementsByTagName("input")[0];
  const span = document.getElementsByTagName("span")[0];
  span.innerHTML = roll_only_one();
}

const check = document.getElementsByTagName("input");
const numbers = document.getElementsByTagName("th");
for (let i = 0; i < 9; i++) {
  numbers[i].addEventListener("click", function () {
    check[i + 1].checked = true;
  });
}

const submit_button = document.getElementById("submit_button");
const roll_button = document.getElementsByTagName("input")[0];
roll_button.addEventListener("click", function () {
  let summ = 0;
  for (let el = 1; el < 10; el++) {
    if (!check[el].disabled) {
      summ += el;
    }
  }
  if (summ <= 6) {
    roll_one_die();
  } else {
    roll_die();
  }
  enable_disable(10);
  disable(0);
});

function enable_disable(i) {
  const checkbox = document.getElementsByTagName("input")[i];
  checkbox.disabled = false;
}

function disable(i) {
  const checkbox = document.getElementsByTagName("input")[i];
  checkbox.disabled = true;
}
submit_button.addEventListener("click", function () {
disable(10);
});
submit_button.addEventListener("click", function () {
  enable_disable(0);
});

function sum_checked_values() {
  let sum = 0;
  for (let el = 1; el < 10; el++) {
    if (check[el].checked) {
      sum += el;
    }
  }
  return sum;
}
function check_submission() {
  const submit_button = document.getElementById("submit_button");
  if (sum_checked_values() == dice_roll) {
    for (let el = 1; el < 10; el++) {
      if (check[el].checked) {
        check[el].checked = false;
        disable(el);
        let label = check[el].labels;
        label[0].style.backgroundColor = 'blue';
      }
    }
  } else {
    alert(
      "The total of the boxes you selected does not match the dice roll. Please try again"
    );
  }
}

function finish() {
  let sum_total = 0;
  for (let el = 1; el < 10; el++) {
    if (!check[el].disabled) {
      sum_total += el;
    }
  }
  alert (`You score is ${sum_total}`);
    const request = new XMLHttpRequest();
  let form = new FormData();
   request.onload = function() {
      if (this.status === 200) {
        window.location = "scores.php";
      }
    };
    form.append('score', sum_total);
    form.append('username', get_username(document.cookie, 'username'));
    request.open('POST', 'score.php');
    request.send(form);
    
}
