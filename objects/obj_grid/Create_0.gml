// CREATES A CONSTRUCTOR OR 'CLASS' FOR GENERATING 2D GRIDS //

/// @description Generate 2D grid

global.grid_list = ds_list_create();

/// @enum TEXT_STATE
/// @description Determines what format to diplay the coordinates in
/// @member NONE
/// @member NUMBER
/// @member LETTER

enum TEXT_STATE
{

    NONE,
    NUMBER,
    LETTER
}

/// @description The amount of padding between the coordinate text and the grid lines.

#macro TEXT_X_PAD 4
#macro TEXT_Y_PAD 4

/// @function() create grid
/// @constructor
/// @param {Real}				_x						Number of pixels to offset grid horizontally
/// @param {Real}				_y						Number of pixels to offset grid vertically
/// @param {Real}				_x_qty					Number of cells horizontally
/// @param {Real}				_y_qty					Number of cells vertically
/// @param {Real}				_x_size					Width of each cell in pixels
/// @param {Real}				_y_size					Height of each cell in pixels
/// @param {Real}				_x_offset				Visial horizontal offset for coordinate numbering.
/// @param {Real}				_y_offset				Visial vertical offset for coordinate numbering.
/// @param {String}				_x_coord_text			Draw horizontal coordinates in numbers, letters or none
/// @param {String}				_y_coord_text			Draw vertical coordinates in numbers, letters or none
/// @param {Asset.GMFont}		_text_font				Select the font to use when drawing coordinate text
/// @param {Constant.Colour}	_select_colour			Colour of selected text
/// @param {Constant.Colour}	_unselect_colour		Colour of non-selected text
/// @param {Constant.Colour}	_grid_colour			Grid line colour
/// @param {Asset.GMSprite}		_sprite					The sprite sheet to draw tiles from
/// @param {Real}				_index					The tile to draw
///
/// @returns {Struct}									A new grid struct

function grid
(	
	_x = 32, _y = 32,
	_x_qty = 4, _y_qty = 3, 
	_x_size = 32, _y_size = 64,
	_x_offset = 1, _y_offset = 1,
	_x_coord_text = TEXT_STATE.LETTER, _y_coord_text = TEXT_STATE.NUMBER, 
	_text_font = fnt_default,
	_select_colour = c_red, _unselect_colour = c_white, _grid_colour = c_green,
	_sprite = spr_sample, _index = 0
) 

constructor
{
    x = _x;
    y = _y;
	
	x_cell_qty = _x_qty;
	y_cell_qty = _y_qty;
	
	x_cell_size = _x_size;
	y_cell_size = _y_size;
	
	x_offset = _x_offset;
	y_offset = _y_offset;
	
	x_coord_text = _x_coord_text;
	y_coord_text = _y_coord_text;
	
	text_font = _text_font;
	
	text_selected_colour = _select_colour;
	text_non_selected_colour = _unselect_colour;
	
	grid_colour = _grid_colour;
	
	sprite = _sprite;
	index = _index;
	
	/// @function number_to_letter
	/// @description							Calculates the equivilent letter of the input number
	/// @param {Real}				_number		Number to convert to its letter equivalent
	/// @returns {String}						A string of letters

	function number_to_letter(_number)
	{
		var _a_qty = ceil(((_number + 1) / 26)) - 1;
	
		var _a_string = "";
		var _b_string = chr((_number mod 26) + 65);
		
		for (var i = 0; i < _a_qty; ++i)
		{
		    _a_string += "A";
		}
	
		return(_a_string + _b_string);
	}
	
	/// @function step
    /// @description Execute step code for grid constructor instance
	
	static step = function()
	{
		
	}
	
	/// @function draw
    /// @description Execute draw code for grid constructor instance
	
	static draw = function()
	{
		draw_set_font(text_font);
		
		// Generate grid
		
		for (var _row = 0; _row < y_cell_qty; ++_row)
		{
		    for (var _column = 0; _column < x_cell_qty; ++_column)
		    {
				
				
				// Draw grid
				
				var _x1 = x + _column	* x_cell_size;
				var _y1 = y + _row		* y_cell_size;
				var _x2 = x + _column	* x_cell_size + x_cell_size;
				var _y2 = y + _row		* y_cell_size + y_cell_size;
				
				draw_rectangle(_x1, _y1, _x2, _y2, 1);
				
				if _row < y_cell_qty - x_offset && _column < x_cell_qty - y_offset
				{
					draw_sprite(sprite, index[_column + x_offset, _row + y_offset], _x1, _y1);
				}
				
				// Draw horizontal text
				
				var _column_text = "";
				
				if x_coord_text = TEXT_STATE.LETTER then _column_text = number_to_letter(_column + x_offset);
				if x_coord_text = TEXT_STATE.NUMBER then _column_text = _column  + x_offset;
				
				var _horizontal_text_x = _x1 + x_cell_size / 2 - string_width(_column) / 2;
				var _hotizontal_text_y = _y1 - string_height(_column);

				if _row = 0 then draw_text(_horizontal_text_x, _hotizontal_text_y, _column_text);
				
				// Draw vertical text
				
				var _row_text = "";
				
				var _vertical_text_x = _x1 - string_width(_row) - 4;
				var _vertical_text_y = _y1 + x_cell_size * _column + y_cell_size / 2 - string_height(_row) / 2;
				
				if y_coord_text = TEXT_STATE.LETTER then _column_text = number_to_letter(_column + y_offset);
				if y_coord_text = TEXT_STATE.NUMBER then _row_text = _row;
				
				if _column = 0 then draw_text(_vertical_text_x, _vertical_text_y, _row + x_offset);
				
		    }
		}
	}
	
	/// @function destroy
    /// @description Execute clean-up code for grid contructor instance
	
	static destroy = function() 
	{
        var index = ds_list_find_index(global.grid_list, self);
        if (index != -1) ds_list_delete(global.grid_list, index);
    }
	
	/// @description Add this newly created grid instance to the global list
	
	ds_list_add(global.grid_list,self);
}

data[0][0] = 1;
data[0][1] = 0;
data[0][2] = 1;

data[1][0] = 0;
data[1][1] = 1;
data[1][2] = 0;

data[2][0] = 1;
data[2][1] = 0;
data[2][2] = 1;

data[3][0] = 0;
data[3][1] = 1;
data[3][2] = 0;


new grid(32, 32, 4, 3, 64, 64, 0, 0, TEXT_STATE.LETTER, TEXT_STATE.NUMBER, fnt_default, c_red, c_white, c_green, spr_sample, data);
