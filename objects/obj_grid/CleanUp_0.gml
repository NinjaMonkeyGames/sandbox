/// @description Cleans up the global grid list if it exists

if (ds_exists(global.grid_list, ds_type_list))
{
    ds_list_clear(global.grid_list);
    ds_list_destroy(global.grid_list);
}