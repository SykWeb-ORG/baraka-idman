const baseUrl = "http://localhost:8000/"
var db_roles = null;
function getData(endUrl) {
    debugger
    $.ajax({
        type: "GET",
        url: baseUrl + endUrl,
        async: false,
        dataType: "json",
        success: (response) => {
            console.log(response);
            db_roles = response.roles;
            fillSelectRole(response.roles);
            displayAllPermissions(response.permissions)
            if (response.roles.length > 0) {
                checkPermissionsByRole(response.roles[0]);
            }
        }
    })
    
}
function fillSelectRole(roles) {
    debugger;
    let select = document.getElementById('role');
    roles.forEach(role => {
        let role_option = document.createElement('option');
        role_option.value = role.id;
        role_option.textContent = role.role_nom;
        select.appendChild(role_option);
    });

}
function displayAllPermissions(permissions) {
    let divPermissions = document.getElementById('permissions_check');
    permissions.forEach(action => {
        let action_input = document.createElement('input');
        action_input.type = 'checkbox';
        action_input.name = 'permissions[]';
        action_input.value = action.id;
        action_input.id = action.id;
        let action_label = document.createElement('label');
        action_label.htmlFor = action.id;
        action_label.textContent = action.action_nom;
        let divContainer = document.createElement('div');
        divContainer.className = 'perm';
        divContainer.appendChild(action_input);
        divContainer.appendChild(action_label);
        divPermissions.appendChild(divContainer);
    });

}
function checkPermissionsByRole(role) {
    role.permissions.forEach(action => {
        let action_input = document.getElementById(action.id);
        action_input.checked = true;
    });

}
$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    getData("roles-permissions")
    let select = document.getElementById('role');
    select.addEventListener('change', function(e){
        debugger
        let selectedRoleId = e.target.value;
        let role_as_array = jQuery.grep(db_roles, function(role) {
            return role.id == selectedRoleId;
        });
        if (role_as_array.length > 0) {
            let role = role_as_array[0];
            document.getElementsByName('permissions[]').forEach(action_input => {
                action_input.checked = false;
            });
            checkPermissionsByRole(role);
        } else {
            return;
        }
    });
    let btnMatchPermissionsRole = document.getElementById('btnMatchPermissionsRole');
    btnMatchPermissionsRole.addEventListener('click', function(e){
        debugger
        let selectedPermissions = jQuery.grep($('input[name="permissions[]"]'), function(permission) {
            return permission.checked;
        });
        let selectedRoleId = select.value;
        if (selectedPermissions.length > 0 && selectedRoleId) {
            let permissionsIds = jQuery.map(selectedPermissions, function(permission){
                return permission.id;
            });
            let endUrl = 'match-role-permission';
            $.ajax({
                type: "POST",
                url: baseUrl + endUrl,
                async: false,
                dataType: "json",
                data:{
                    permissions : permissionsIds,
                    role: selectedRoleId,
                },
                success: (role) => {
                    console.log(role);
                    alert("Les changements sont bien effectués.");
                    document.location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(xhr.responseText);
                }
            });
        }else{
            return;
        }
    })

})
