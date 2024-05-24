$("#reservation__form--input-date").change(function () {
    const input_date = document.getElementById('reservation__form--input-date');
    const display_date = document.getElementById('reservation__form--confirmation-date');
    display_date.textContent = input_date.value;
});

$("#reservation__form--select-time").change(function () {
    const select_time = document.getElementById('reservation__form--select-time');
    const display_time = document.getElementById('reservation__form--confirmation-time');
    display_time.textContent = select_time.value;
});

$("#reservation__form--select-number").change(function () {
    const select_number = document.getElementById('reservation__form--select-number');
    const display_number = document.getElementById('reservation__form--confirmation-number');
    display_number.textContent = select_number.value;
});

$(".button__delete").click(function () {
    var checked = window.confirm("予約を削除します。よろしいですか？");
    if (checked == true) {
        return true;
    } else {
        return false;
    }
})