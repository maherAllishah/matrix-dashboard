
    let select = document.querySelectorAll('.ss');
    for(let i=0;i<5;i++){
        if(select[i]){
            select[i].addEventListener('change', () => {
            if (select[i].value == "hidden") {
                select[i].classList.add('hidden-career');
                select[i].classList.remove('visible-career');
            }
            else if (select[i].value == "visible") {
                select[i].classList.remove('hidden-career');
                select[i].classList.add('visible-career');
            }

        });
        }

}
