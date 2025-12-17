/// @description Loops through draw code for each grid instance

for (var i = 0; i < ds_list_size(global.grid_list); i++)
{
    var current_instance = global.grid_list[| i];  // Get the current 'test' instance
    current_instance.draw();

}