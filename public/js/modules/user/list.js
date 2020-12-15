$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

elementProperty.addEventInElement('#search-user','oninput',function (){
    let key = this.value;
    key = key.toUpperCase();
    console.log(key)
    elementProperty.getElement('.through-users', users => {
        let user = users.getAttribute('data').toUpperCase();
        if(!user.includes(key))
            return users.style.display = 'none';
        users.style.display = '';
    })
});

elementProperty.addEventInElement('.delete-user','onclick',function (){
    let id = this.getAttribute('id');
    SwalCustom.dialogConfirm('Deseja desativa esse usuário?','Essa ação é irreversivel', status =>{
        if(!status)
            return false;

        UserController.delete(id).then(response => {
            if(response.status){
                elementProperty.getElement(`.user-${id}`,that => {
                    that.style.display = 'none';
                })
                return swal('Usuário excluido com sucesso', '', 'success');
            }
            return swal('Erro ao excluir usuário','Contate o suporte','info');
        })

    })
})

elementProperty.addEventInElement('#search-patients','oninput',function (){
    let key = this.value;
    key = key.toUpperCase();
    console.log(key)
    elementProperty.getElement('.through-patients', users => {
        let user = users.getAttribute('data').toUpperCase();
        if(!user.includes(key))
            return users.style.display = 'none';
        users.style.display = '';
    })
});
