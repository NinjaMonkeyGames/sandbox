// CREATES A CONSTRUCTOR OR 'CLASS' FOR GENERATING PALETTES //

/// @description Generate 2D grid

global.palette_list = [];

enum STATE
{
    ENABLED,
    ENABLED_HOVER,
    ENABLED_CLICK,
        
    DISABLED,
    DISABLED_HOVER,
    DISABLED_CLICK,
        
    INSET,
    INSET_HOVER,
    INSET_CLICK,
}

/// @function palette(_palette_data)
/// @constructor
/// @desc											Generates a palette (set of buttons) based on parameters.
/// @param {Struct}							_palette_data  Data containing palette properties
/// @returns {Struct}						A new palette struct

function palette(_palette_data = PALETTE.EXAMPLE) constructor
{
	last_sound = undefined;
	
	spt_palette_properties(_palette_data);
	update_palette();
	
	/// @function update_palette
	/// @desc										Populates palette with default data		
	
    function update_palette()
	{
		for (var _i = 0; _i < palette_item_qty; ++_i) 
		{
				set_palette_state(state_data[_i], _i);
		}
	}
	
	/// @function set_palette_state
	/// @desc											Switches state of individual palette item (Hovered, clicked etc...)
	/// @param {Struct}							_state  The state to put the palette item in
	/// @param {Struct}							_id  Select palette ID to apply the new state to
	/// @returns {Struct}					
	
	function set_palette_state(_state , _id)
	{
		// 1. Cache the specific property array for the current state
		
		var _state_property = data[_state];
		var _enabled_property = data[STATE.ENABLED];

		// 2. Fetch raw sprite and dimensions
		
		var _sprite = _state_property[PROPERTY.SPRITE];
		
		palette_sprite_data[_id]			= _sprite;
		palette_sprite_index_data[_id] = _id;

		var _width_raw = sprite_get_width(_sprite);
		var _height_raw = sprite_get_height(_sprite);
		
		palette_sprite_width_raw_data[_id]  = _width_raw;
		palette_sprite_height_raw_data[_id] = _height_raw;

		// 3. Scale math
		
		var _x_scale = _state_property[PROPERTY.X_SCALE];
		var _y_scale = _state_property[PROPERTY.Y_SCALE];
		
		palette_sprite_x_scale_data[_id]			= _x_scale;
		palette_sprite_y_scale_data[_id]			= _y_scale;
		palette_sprite_width_scale_data[_id]  = _width_raw * _x_scale;
		palette_sprite_height_scale_data[_id]	= _height_raw * _y_scale;

		// 4. Grid Position math (using the ENABLED state base scale)
		
		var _cell_width  = _width_raw * _enabled_property[PROPERTY.X_SCALE];
		var _cell_height = _height_raw * _enabled_property[PROPERTY.Y_SCALE];

		palette_sprite_x_pos_data[_id] = x_offset + (_id % max_row_qty) * (_cell_width + x_gap);
		palette_sprite_y_pos_data[_id] = y_offset + floor(_id / max_row_qty) * (_cell_height + y_gap);

		// 5. Remaining Misc Properties
		
		palette_sprite_angle_data[_id] = _state_property[PROPERTY.ANGLE];
		palette_sprite_alpha_data[_id] = _state_property[PROPERTY.ALPHA];
		palette_sound_data[_id]			= _state_property[PROPERTY.SOUND];
		palette_cursor_data[_id]			= _state_property[PROPERTY.CURSOR];
	}

	/// @function									get_palette_id
	/// @desc										Get Selected palette ID or return undefined
	/// @returns {Real}						Returns the selected palette ID
	
function get_palette_id()
{
    // 1. Cache the base scales once BEFORE the loop runs
	
    var _base_x = data[STATE.ENABLED][PROPERTY.X_SCALE];
    var _base_y = data[STATE.ENABLED][PROPERTY.Y_SCALE];

    for (var _i = 0; _i < palette_item_qty; ++_i) 
    {
        var _x1 = palette_sprite_x_pos_data[_i];
        var _y1 = palette_sprite_y_pos_data[_i];
        var _x2 = _x1 + (palette_sprite_width_raw_data[_i] * _base_x);
		var _y2 = _y1 + (palette_sprite_height_raw_data[_i] * _base_y);
		
        // 2. Inline the math directly into the collision check
		
        if point_in_rectangle(mouse_x, mouse_y,  _x1, _y1, _x2,  _y2) 
		{
            return _i;
        }
    }
    
    return undefined;
}

    /// @function			step
    /// @description	Execute step code for palette constructor instance
	
	function step()
    {
		var _id = get_palette_id() ;
		var _has_focus = has_focus();
		
		if _has_focus
		{
			if _id != undefined // Hover
			{
					if  state_data[_id] == STATE.ENABLED	|| state_data[_id] == STATE.ENABLED_CLICK then state_data[_id]		= STATE.ENABLED_HOVER;
					if  state_data[_id] == STATE.DISABLED	|| state_data[_id] == STATE.DISABLED_CLICK then state_data[_id]	= STATE.DISABLED_HOVER;
					if  state_data[_id] == STATE.INSET			|| state_data[_id] ==  STATE.INSET_CLICK then state_data[_id]			= STATE.INSET_HOVER;
					
				if mouse_check_button(mb_left) // Click
				{
					if  state_data[_id] == STATE.ENABLED_HOVER then state_data[_id]	= STATE.ENABLED_CLICK;
					if  state_data[_id] == STATE.DISABLED_HOVER then state_data[_id]	= STATE.DISABLED_CLICK;
					if  state_data[_id] == STATE.INSET_HOVER then state_data[_id]			= STATE.INSET_CLICK;
				}
			
				if mouse_check_button_pressed(mb_left) // Press
				{
					if  state_data[_id] == STATE.INSET_CLICK then state_data[_id] = STATE.ENABLED;
				
					if inset_enabled[_id] == true
					{
						if  state_data[_id] == STATE.ENABLED_CLICK then state_data[_id] = STATE.INSET;
					}
				
					if state_data[_id] != STATE.DISABLED_HOVER && state_data[_id] != STATE.DISABLED_CLICK
					{
						spt_palette_actions(PALETTE.EXAMPLE, _id);  // Call palette action code for selected palette ID
					}
				}
			
				if last_sound != palette_sound_data[_id]	
				{
					if palette_sound_data[_id] != undefined then audio_play_sound(palette_sound_data[_id], 0, false);
				}
					last_sound = palette_sound_data[_id];
				
				window_set_cursor(palette_cursor_data[_id]);
			}
				else // No hover
			{
				window_set_cursor(cursor_default); 
			
				if !mouse_check_button(mb_left)
				{
					for (var _i = 0; _i < palette_item_qty; ++_i)
					{
						if state_data[_i]  != STATE.DISABLED					&& 
						   state_data[_i] != STATE.INSET							&& 
						   state_data[_i] != STATE.INSET_HOVER				&& 
						   state_data[_i] != STATE.DISABLED_HOVER
						{
							state_data[_i]  = STATE.ENABLED;
						}
				
						if state_data[_i]  == STATE.INSET_HOVER then state_data[_i]  = STATE.INSET;
					}
				}
			}
		}
		update_palette();
	}
	
	/// @function				destroy
    /// @description		Clean up references and reset system state.
    /// @param {Struct} [target=self] Optional specific palette struct to destroy
    
    function destroy(target = self)
    {
        window_set_cursor(cursor_default);
        
        var _id = array_get_index(global.palette_list, target);
		
        if (_id != -1) 
        {
            array_delete(global.palette_list, _id, 1);
        }
    }
	
	/// @function has_focus()
	/// @desc Checks if this palette is the highest-level palette under the mouse
	/// @returns {Bool}
	
	function has_focus()
	{
	    for (var _i = array_length(global.palette_list) - 1; _i >= 0; --_i)
	    {
	        var _instance = global.palette_list[_i];
			
	        if (_instance.get_palette_id() != undefined)
	        {
	            return (_instance == self);
	        }
	    }
	    return true; // No palettes are being hovered at all
	}
	
    /// @function			draw
    /// @description	Execute draw code for palette constructor instance
	
    function draw()
    {
        for (var _i = 0; _i < palette_item_qty; ++_i)
        {
            draw_sprite_ext
			(
				palette_sprite_data[_i], 
				palette_sprite_index_data[_i],
				palette_sprite_x_pos_data[_i],
				palette_sprite_y_pos_data[_i],
				palette_sprite_x_scale_data[_i],
				palette_sprite_y_scale_data[_i],
				palette_sprite_angle_data[_i], 
				c_white, 
				palette_sprite_alpha_data[_i]);
        }
    }
    array_push(global.palette_list, self);
}

example = new palette(PALETTE.EXAMPLE);