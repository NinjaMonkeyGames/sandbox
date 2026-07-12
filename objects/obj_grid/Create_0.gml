// CREATES A CONSTRUCTOR  FOR GENERATING A 2D GRID //

/// @description Generate 2D grid

global.grid_list = [];

#macro CONST_MAX_GRID_ROW 9999
#macro CONST_MAX_GRID_COLUMN 9999

/// @function grid()
/// @constructor
/// @description																					Generates a 2D grid based on parameters.
/// @parameter {Real}							_x_offset								Offset grid drawing horizontally.
/// @parameter {Real}							_y_offset								Offset grid drawing vertically.
/// @parameter {Real}							_cell_width								Width of cell.
/// @parameter {Real}							_cell_height							Height of cell.
/// @parameter {Real}							_row_qty								Number of cells to draw vertically.
/// @parameter {Real}							_column_qty							Number of cells to draw horizontally.
/// @parameter {Constant.Colour}		_text_colour							Colour of label cell text when not selected.
/// @parameter {Constant.Colour}		_text_colour_selected			Colour of label cell text when selected.
/// @returns {Struct}							A new grid struct					

function grid(_x_offset = 32, _y_offset = 32, _cell_width = 64, _cell_height = 64, _row_qty = 12, _column_qty = 16, _text_colour = c_white, _text_colour_selected = c_red) constructor
{
	x_offset = _x_offset;
	y_offset = _y_offset;
	
	x_scale = 1;
	y_scale = 1;
	
	min_scale = 0.125;
	max_scale = 4;
	
	base_width = _cell_width;
	base_height = _cell_height;
	
	cell_width = _cell_width * x_scale;
	cell_height = _cell_height * y_scale;
	
	min_width = 16;
	max_width = 256;
	
	selected_x = undefined;
	selected_y = undefined;
	
	row_qty = _row_qty;
	column_qty = _column_qty;
	
	column_text_enabled = true;
	row_text_enabled = true;
	
	column_text_number = false;
	row_text_number = false;
	
	text_x_coord_shift = 0;
	text_y_coord_shift = 0;
	
	text_colour = _text_colour;
	text_colour_selected = _text_colour_selected;
	
	label_x_text_padding = 16;
	label_y_text_padding = 16;
	
	initialise_grid();

    /// @function											initialise_grid
    /// @description									Updates grid or initialises first grid. 				

	function initialise_grid()
	{
		cell_data = array_create(row_qty * column_qty);
		
		for (var _row = 0; _row < row_qty; _row++)
		{
			for (var _column = 0; _column < column_qty; _column++)
			{
			    var _index = _row * column_qty + _column;
            
			    cell_data[_index] = 
			    {
			        x: x_offset + (_column * cell_width),
			        y: y_offset + (_row* cell_height),
					
			        width: cell_width,
			        height: cell_height,
					
					column_label_x: x_offset + (_column * cell_width) + (cell_width / 2),
					column_label_y: y_offset - label_x_text_padding,
					
					row_label_x: x_offset - label_y_text_padding,
					row_label_y: y_offset + (_row * cell_height) + (cell_height / 2),
					
					column_text: column_text_number ? _column + text_x_coord_shift : spt_convert_letters(_column + text_x_coord_shift),
					row_text: row_text_number ? _row + text_y_coord_shift : spt_convert_letters(_row + text_y_coord_shift),
			    };
			}
		}
		
		is_destroyed = false;
	}
	
    /// @function											update_column_qty
    /// @description									Increases or decreases the amount of cells to draw vertically.
	/// @parameter			{real}		_qty	Number of cells to remove or add.
	/// @returns {void}
	
	static update_column_qty = function(_qty)
    {
		if column_qty + _qty > 0 && column_qty < CONST_MAX_GRID_COLUMN
		{
			column_qty += _qty;
			initialise_grid();
		}
	}
	
	/// @function											update_row_qty
    /// @description									Increases or decreases the amount of cells to draw horizontally.
	/// @parameter			{real}		_qty	Number of cells to remove or add.
	
	static update_row_qty = function(_qty)
    {
		if is_real(_qty) 
		{
			//if _qty > abs(CONST_MAX_GRID_ROW) && _qty < CONST_MAX_GRID_ROW
			//{
				//if row_qty + _qty > 0 && row_qty < CONST_MAX_GRID_ROW
				//{
					row_qty += _qty;
					
					initialise_grid();
				}
			//}
		//}
	}

    /// @function										update_width
    /// @description								Changes the width of the cells.
	/// @parameter		{real}	_width	New cell width.
	/// @returns {void}
	
	static update_width = function(_width)
    {
		cell_width = _width;
		initialise_grid();
	}
	
	 /// @function									update_height
    /// @description								Changes the height of the cells.
	/// @parameter		{real}	_width	New cell height.
	/// @returns {void}
	
	static update_height = function(_height)
    {
		cell_height = _height;
		initialise_grid();
	}
	
	/// @function													get_x_coord
    /// @description											Gets the coordinate of the selected column.
	/// @parameter		{real}		_pointer_x		The X value for pointer. (Allows for custom pointers or unorthodox checks)
	/// @return			{real}								X coordinate value.
	
	static get_x_coord = function(_pointer_x = mouse_x)
    {
	    var _x = floor((_pointer_x - x_offset) / cell_width);
	    return (_x >= 0 && _x < column_qty) ? _x : undefined;
	}
	
	/// @function													get_y_coord
    /// @description											Gets the coordinate of the selected row.
	/// @parameter		{real}		_pointer_y		The Y value for pointer. (Allows for custom pointers or unorthodox checks)
	/// @return			{real}								Y coordinate value.
	
	static get_y_coord = function(_pointer_y = mouse_y)
    {
	    var _y = floor((_pointer_y - y_offset) / cell_height);
	    return (_y >= 0 && _y < row_qty) ? _y : undefined;
	}
	
	/// @function										shift_x_coord
    /// @description								Shift coordinate text.
	
	static shift_x_coord = function(_qty)
    {
		text_x_coord_shift += _qty;
		initialise_grid();
	}
	
	/// @function										shift_y_coord
    /// @description								Shift coordinate text.
	/// @returns {void}
	
	static shift_y_coord = function(_qty)
    {
		text_y_coord_shift += _qty;
		initialise_grid();
	}
	
	/// @function													zoom
    /// @description											Zoom grid in and out.

	/// @returns {void}
	
	static zoom = function()
    {
		
	}
	
	/// @function destroy()
	/// @description Cleans up the instance from the global list and clears data
	
	static destroy = function() 
	{
	    // Find the current instance's index in the global array
		
	    var _index = array_get_index(global.grid_list, self);
    
	    // Only remove if it actually exists in the array
		
	    if (_index != -1)  { array_delete(global.grid_list, _index, 1)};
    
	    cell_data = undefined; // Clear cell data
	
	    // Mark as destroyed so any lingering references can check before use
		
	    is_destroyed = true;
	}
	/// @function			step
    /// @description	Execute step code for grid constructor instance.
	/// @returns {void}
	
	static step = function() 
    {
		if keyboard_check_pressed(vk_space)
		{
			update_row_qty(10);
		}
		
		selected_x = get_x_coord();
	    selected_y = get_y_coord();
	}
	
    /// @function			draw
    /// @description	Execute draw code for grid constructor instance.
	/// @returns {void}
	
    static draw = function() 
    {
		// DRAW GRID
		
		var _cell_qty = array_length(cell_data);
		
		for (var _i = 0; _i < _cell_qty; _i++)
		{
		    var _cell = cell_data[_i];
    
		    var _x1 = cell_data[_i].x;
			var _y1 = cell_data[_i].y;
			var _x2 = cell_data[_i].x + cell_data[_i].width;
			var _y2 = cell_data[_i].y + cell_data[_i].height;
			
		    draw_rectangle(_x1, _y1, _x2, _y2, true);
		}
		
		// DRAW COORDINATE TEXT

	    draw_set_halign(fa_center);
	    draw_set_valign(fa_middle);

		// Column labels (top)

	    if (column_text_enabled)
	    {
	        for (var _column = 0; _column < column_qty; _column++)
	        {
	            var _label_x = cell_data[_column].column_label_x;
	            var _label_y = cell_data[_column].column_label_y;

	          
	            var _text =cell_data[_column].column_text ;

	            draw_set_colour((_column == selected_x ) ? text_colour_selected : text_colour);
	            draw_text(_label_x, _label_y, string(_text));
	        }
	    }

	    // Row labels (left)
		
		if (row_text_enabled)
        {
            for (var _row = 0; _row < row_qty; _row++)
            {
                var _index = _row * column_qty; 
        
                var _label_x = cell_data[_index].row_label_x;
                var _label_y = cell_data[_index].row_label_y;
        
                var _text = cell_data[_index].row_text;

                draw_set_colour((_row == selected_y ) ? text_colour_selected : text_colour);
                draw_text(_label_x, _label_y, string(_text));
            }
        }
	}
	
    array_push(global.grid_list, self);
}

