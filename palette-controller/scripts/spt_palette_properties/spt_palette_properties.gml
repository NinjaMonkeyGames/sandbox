/// @function() spt_palette_actions
/// @desc																Defines profiles for different palettes
/// @param {Real}				_palette_id				Identifier for the palette (e.g., 0 = default palette)
/// @returns {void}	
	
enum PROPERTY
{
	SPRITE,
	X_SCALE,
	Y_SCALE,
	ANGLE,
	ALPHA,
	CURSOR,
	INSET_ENABLED,
	SOUND
}
	
enum PALETTE
{
	EXAMPLE
}

/// @function() spt_palette_proporties
/// @desc																Stores profiles for different palettes
/// @param {Real}				_palette_id				Identifier for the palette (e.g., 0 = default palette)
/// @returns {void}	

function spt_palette_properties(_id)
{
	switch(_id)
	{
		case PALETTE.EXAMPLE:
		
			// DEFAULT SPRITE
			
			data[STATE.ENABLED][PROPERTY.SPRITE] = spr_example_buttons;
			data[STATE.DISABLED][PROPERTY.SPRITE] = spr_example_buttons_disabled;
			data[STATE.INSET][PROPERTY.SPRITE] = spr_example_buttons_inset;
			
			// HOVER SPRITE
			
			data[STATE.ENABLED_HOVER][PROPERTY.SPRITE] = spr_example_buttons;
			data[STATE.DISABLED_HOVER][PROPERTY.SPRITE] = spr_example_buttons_disabled;
			data[STATE.INSET_HOVER][PROPERTY.SPRITE] = spr_example_buttons_inset;
			
			// CLICK SPRITE
			
			data[STATE.ENABLED_CLICK][PROPERTY.SPRITE] = spr_example_buttons;
			data[STATE.DISABLED_CLICK][PROPERTY.SPRITE] = spr_example_buttons_disabled;
			data[STATE.INSET_CLICK][PROPERTY.SPRITE] = spr_example_buttons_inset;
			
			// DEFAULT SCALE
			
			data[STATE.ENABLED][PROPERTY.X_SCALE] = 0.50;
			data[STATE.ENABLED][PROPERTY.Y_SCALE] = 0.50;
			
			// DISABLED SCALE
			
			data[STATE.DISABLED][PROPERTY.X_SCALE] = 0.50;
			data[STATE.DISABLED][PROPERTY.Y_SCALE] = 0.50;
		
			// INSET SCALE
		
			data[STATE.INSET][PROPERTY.X_SCALE] = 0.42;
			data[STATE.INSET][PROPERTY.Y_SCALE] = 0.42;
			
			// DEFAULT HOVER SCALE
			
			data[STATE.ENABLED_HOVER][PROPERTY.X_SCALE] = 0.46;
			data[STATE.ENABLED_HOVER][PROPERTY.Y_SCALE] = 0.46;
			
			// DISABLED HOVER SCALE
			
			data[STATE.DISABLED_HOVER][PROPERTY.X_SCALE] = 0.48;
			data[STATE.DISABLED_HOVER][PROPERTY.Y_SCALE] = 0.48;
			
			// INSET HOVER SCALE
			
			data[STATE.INSET_HOVER][PROPERTY.X_SCALE] = 0.36;
			data[STATE.INSET_HOVER][PROPERTY.Y_SCALE] = 0.36;
			
			// DEFAULT CLICK SCALE
			
			data[STATE.ENABLED_CLICK][PROPERTY.X_SCALE] = 0.40;
			data[STATE.ENABLED_CLICK][PROPERTY.Y_SCALE] = 0.40;
			
			// INSET CLICK SCALE
			
			data[STATE.INSET_CLICK][PROPERTY.X_SCALE] = 0.44;
			data[STATE.INSET_CLICK][PROPERTY.Y_SCALE] = 0.44;
			
			// DISABLED CLICK SCALE
			
			data[STATE.DISABLED_CLICK][PROPERTY.X_SCALE] = 0.50;
			data[STATE.DISABLED_CLICK][PROPERTY.Y_SCALE] = 0.50;
			
			// DEFAULT ANGLE
			
			data[STATE.ENABLED][PROPERTY.ANGLE] = 0;
			data[STATE.ENABLED_HOVER][PROPERTY.ANGLE] = 0;
			data[STATE.ENABLED_CLICK][PROPERTY.ANGLE] = 0;
			
			// DISABLED ANGLE
			
			data[STATE.DISABLED][PROPERTY.ANGLE] = 0;
			data[STATE.DISABLED_HOVER][PROPERTY.ANGLE] = 0;
			data[STATE.DISABLED_CLICK][PROPERTY.ANGLE] = 0;
			
			// INSET ANGLE
			
			data[STATE.INSET][PROPERTY.ANGLE] = 0;
			data[STATE.INSET_HOVER][PROPERTY.ANGLE] = 0;
			data[STATE.INSET_CLICK][PROPERTY.ANGLE] = 0;
			
			// DEFAULT ANGLE
			
			data[STATE.ENABLED][PROPERTY.ALPHA] = 1;
			data[STATE.ENABLED_HOVER][PROPERTY.ALPHA] = 1;
			data[STATE.ENABLED_CLICK][PROPERTY.ALPHA] = 1;
			
			// DISABLED ALPHA
			
			data[STATE.DISABLED][PROPERTY.ALPHA] = 1;
			data[STATE.DISABLED_HOVER][PROPERTY.ALPHA] = 1;
			data[STATE.DISABLED_CLICK][PROPERTY.ALPHA] = 1;
			
			// INSET ALPHA
			
			data[STATE.INSET][PROPERTY.ALPHA] = 1;
			data[STATE.INSET_HOVER][PROPERTY.ALPHA] = 1;
			data[STATE.INSET_CLICK][PROPERTY.ALPHA] = 1;
			
			// DEFAULT SOUND
			
			data[STATE.ENABLED][PROPERTY.SOUND] = undefined;
			data[STATE.ENABLED_HOVER][PROPERTY.SOUND] = snd_hover;
			data[STATE.ENABLED_CLICK][PROPERTY.SOUND] = snd_click;
		
			// DISABLED SOUND
		
			data[STATE.DISABLED][PROPERTY.SOUND] = undefined;
			data[STATE.DISABLED_HOVER][PROPERTY.SOUND] = snd_hover;
			data[STATE.DISABLED_CLICK][PROPERTY.SOUND] = snd_disabled;
			
			// INSET SOUND
			
			data[STATE.INSET][PROPERTY.SOUND] = undefined;
			data[STATE.INSET_HOVER][PROPERTY.SOUND] = snd_hover;
			data[STATE.INSET_CLICK][PROPERTY.SOUND] = snd_inset;
			
			// DEFAULT CURSOR
			
			data[STATE.ENABLED][PROPERTY.CURSOR] = cr_handpoint;
			data[STATE.ENABLED_HOVER][PROPERTY.CURSOR] = cr_handpoint;
			data[STATE.ENABLED_CLICK][PROPERTY.CURSOR] = cr_handpoint;
		
			// DISABLED CURSOR
		
			data[STATE.DISABLED][PROPERTY.CURSOR] = cr_cross;
			data[STATE.DISABLED_HOVER][PROPERTY.CURSOR] = cr_cross;
			data[STATE.DISABLED_CLICK][PROPERTY.CURSOR] = cr_cross
			
			// INSET CURSOR
			
			data[STATE.INSET][PROPERTY.CURSOR]       = cr_handpoint;
			data[STATE.INSET_HOVER][PROPERTY.CURSOR] = cr_handpoint;
			data[STATE.INSET_CLICK][PROPERTY.CURSOR] = cr_handpoint;
			
			x_offset = 32;
			y_offset = 32;
			
			x_gap = 16;
			y_gap = 16;
			
			palette_item_qty = sprite_get_number(data[STATE.ENABLED][PROPERTY.SPRITE]);
			max_row_qty = 7;
			
			cursor_default = cr_arrow;
			
			for (var _i = 0; _i < palette_item_qty; ++_i)
			{
				inset_enabled[_i] = false;
			    state_data[_i] = STATE.ENABLED;
			}
			
			state_data[0] = STATE.DISABLED;
			
			state_data[3] = STATE.INSET;
			state_data[29] = STATE.INSET;
			state_data[30] = STATE.INSET;

			inset_enabled[3] = true;
			inset_enabled[29] = true;
			inset_enabled[30] = true;
			
		break;
	}
}