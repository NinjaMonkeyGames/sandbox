// CREATES A CONSTRUCTOR OR 'CLASS' FOR GENERATING A 2D GRID //

/// @description Generate 2D grid

global.grid_list = [];

#macro CONST_MAX_GRID_ROW 9999
#macro CONST_MAX_GRID_COLUMN 9999

/// @function grid()
/// @constructor
/// @desc													Generates a 2D grid based on parameters.
/// @param {Struct}		_x						Number of pixels to offset drawing grid horizontally relative to suface it has been drawn to
/// @returns {Struct}								A new grid struct

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
	
	row_qty = _row_qty;
	column_qty = _column_qty;
	
	column_text_enabled = true;
	row_text_enabled = true;
	
	column_text_number = false;
	row_text_number = false;
	
	text_x_coord_shift = 0;
	text_y_coord_shift = 1;
	
	text_colour = _text_colour;
	text_colour_selected = _text_colour_selected;
	
	initialise_grid();

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
			    };
			}
		}
	}
	
    /// @function										update_row_qty
    /// @description								Increases or decreases the amount of cells to draw horizontally
	/// @param			{real}		          _qty	Number of cells to remove or add
	
	function update_row_qty(_qty)
    {
		if row_qty + _qty > 0 && row_qty < CONST_MAX_GRID_ROW
		{
			row_qty += _qty;
			initialise_grid();
		}
	}
	
    /// @function										update_column_qty
    /// @description								Increases or decreases the amount of cells to draw vertically
	/// @param			{real}		_qty     Number of cells to remove or add
	
	function update_column_qty(_qty)
    {
		if column_qty + _qty > 0 && column_qty < CONST_MAX_GRID_COLUMN
		{
			column_qty += _qty;
			initialise_grid();
		}
	}

    /// @function										update_width
    /// @description								Changes the width of the cells
	/// @param			{real}	_width	New cell width
	
	function update_width(_width)
    {
		cell_width = _width;
		initialise_grid();
	}
	
	 /// @function									update_height
    /// @description								Changes the height of the cells
	/// @param			{real}	_width	New cell height
	
	function update_height(_height)
    {
		cell_height = _height;
		initialise_grid();
	}
	
	/// @function										get_x_coord
    /// @description								Gets the coordinate of the selected row
	/// @return			{real}					X coordinate value
	
	function get_x_coord()
    {
		var _x1 = x_offset;
		var _y1 = y_offset;
		var _x2 = _x1 + cell_width * column_qty;
		var _y2 = _y1 + cell_height * row_qty;
		
		if point_in_rectangle(mouse_x, mouse_y, _x1, _y1, _x2, _y2)
		{
			return ceil(round(mouse_x - x_offset)  / cell_width) - 1;
		}
			else
		{
			return undefined;
		}
	}
	
	/// @function										get_y_coord
    /// @description								Gets the coordinate of the selected row
	/// @return			{real}					Y coordinate value
	
	function get_y_coord()
    {
		var _x1 = x_offset;
		var _y1 = y_offset;
		var _x2 = _x1 + cell_width * column_qty;
		var _y2 = _y1 + cell_height * row_qty;
		
		if point_in_rectangle(mouse_x, mouse_y, _x1, _y1, _x2, _y2)
		{
			return ceil(round(mouse_y - y_offset)  / cell_height) - 1;
		}
			else
		{
			return undefined;
		}
	}
	
	/// @function										shift_x_coord
    /// @description								Shift coordinate text
	
	function shift_x_coord(_qty)
    {
		text_x_coord_shift += _qty;
	}
	
	/// @function										shift_y_coord
    /// @description								Shift coordinate text
	
	function shift_y_coord(_qty)
    {
		text_y_coord_shift += _qty;
	}
	
	/// @function													zoom
    /// @description											Zoom grid in and out
	/// @param	{real}		_qty						Amount to zoom (takes negative values)
	/// @param	{bool}		_keep_aspect			The grid will double and half cell size and qty.
	
	function zoom(_qty, _keep_aspect = true)
    {
		if _keep_aspect == true
		{
			if _qty < 0
			{
				x_scale *= 2;
				y_scale *= 2;
			
				column_qty /= 2;
				row_qty /= 2;
			}
				else
			{
				x_scale /= 2;
				y_scale /= 2;
			
				column_qty *= 2;
				row_qty *= 2;
			}
		}
			else
		{
			x_scale += _qty;
			y_scale += _qty;
		}
		
		cell_width = base_width * x_scale;
		cell_height = base_height * y_scale;
		
		initialise_grid();
	}

    /// @function			step
    /// @description	Execute step code for grid constructor instance
	
	function step()
    {
		if mouse_wheel_down()
		{
			if x_scale < max_scale then zoom(-1, true);
		}
		
		if mouse_wheel_up()
		{
			if x_scale > min_scale then zoom(1, true);
		}
		
		if keyboard_check_pressed(vk_left){shift_x_coord(-1);}
		if keyboard_check_pressed(vk_right){shift_x_coord(1);}
		if keyboard_check_pressed(vk_up){shift_y_coord(-1);}
		if keyboard_check_pressed(vk_down){shift_y_coord(1);}

	}
	
    /// @function			draw
    /// @description	Execute draw code for grid constructor instance
	
    function draw()
    {
		// Draw Grid
		
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
		
			// Draw Coordinate Text
		
			draw_set_halign(fa_center);
		    draw_set_valign(fa_middle);

		    // 1. Draw Column Labels (Top)
			
			for (var _column = 0; _column < column_qty; _column++)
			{
			    var _label_x = x_offset + (_column * cell_width) + (cell_width / 2);
			    var _label_y = y_offset - 16; 
    
			    // Apply the shift to the column index before calculating display text
				
			    var _shifted_column = _column + text_x_coord_shift;
    
			    var _column_text;
			    if (column_text_number == true) 
			    {
			        _column_text = _shifted_column;
			    }
			    else 
			    {
			        // Now the letter converter receives the shifted index
					
			        _column_text = spt_convert_letters(_shifted_column);
			    }
    
			    if (column_text_enabled == true)
			    {
			        var _text_colour = (_column == get_x_coord()) ? text_colour_selected : text_colour;
			        draw_set_colour(_text_colour);
			        draw_text(_label_x, _label_y, string(_column_text)); 
			    }
			}

		    // 2. Draw Row Labels (Left)
			
			for (var _row = 0; _row < row_qty; _row++)
			{
			    var _label_x = x_offset - 16;
			    var _label_y = y_offset + (_row * cell_height) + (cell_height / 2);
    
			    // Apply the shift to the row index before calculating display text
				
			    var _shifted_row = _row + text_y_coord_shift;
    
			    var _row_text;
				
			    if (row_text_number == true) 
			    {
			        _row_text = _shifted_row;
			    }
					else 
			    {
			        // Ensure your helper function can handle the shifted value
					
			        _row_text = spt_convert_letters(_shifted_row);
			    }
    
			    if (row_text_enabled == true)
			    {
			        var _text_colour = (_row == get_y_coord()) ? text_colour_selected : text_colour;
			        draw_set_colour(_text_colour);
			        draw_text(_label_x, _label_y, string(_row_text)); 
			    }
			}
	}
	
    array_push(global.grid_list, self);
}

example_grid = new grid();