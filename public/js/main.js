const show = document.querySelector('#show');
const pass = document.querySelector('#password');
show ? show.onclick = () => {
    const type = pass.getAttribute('type');
    if (type == 'text') {
        show.classList.remove('text-primary');
        return pass.setAttribute('type', 'password');
    }
    show.classList.add('text-primary');
    pass.setAttribute('type', 'text');
} : null;


// const card_data = document.querySelectorAll('.card-data > div');
// card_data.forEach(data => {
//     const array_data = data.append('column');
//     console.log(array_data);
//     data.onclick = () => {
//         const text = document.querySelector(`.${data.classList[1]} .inner p`);
//         // console.log(data.classList[1]);
//         console.log(text);
//     }
// });

$('.card-data > div').on('click', () => {
    alert($(this).text())
})
