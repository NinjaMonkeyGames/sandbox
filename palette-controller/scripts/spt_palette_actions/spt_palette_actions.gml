/// @function() spt_palette_actions
/// @desc												Handles actions triggered for a given palette
/// @param {Real}				_palette_id				Identifier for the palette (e.g., 0 = default palette)
/// @param {Real}				_action_id				Identifier for the action to perform for the specified palette
/// @returns {void}	

function spt_palette_actions(_palette_id, _action_id)
{
	if _palette_id == 0
	{
		switch _action_id
		{
			case 0: 
				
				
			
			break;
			
			case 1: 
				

				

			break;
			
			case 2: 
				

			
			break;
			
			case 3: 
				
				
			
			break;
			
			case 30: 
				

			
			break;
			
			case 34: 

				game_end(0);
				
			
			break;
		}
	}
}