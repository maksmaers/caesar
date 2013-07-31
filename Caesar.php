<?php
/**
* Class that produce Caesar algorithm of message encoding/decoding
*
* @since 1.0.0
*/

class Caesar
{
	
	public  static $key = 12;
	public  static $symbols = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_-abcdefghijklmnopqrstuvwxyz';
 
	/**
	* Method to get decoded or encoded message
	*
	* @param   string  $message  Message
	* @param   string  $mode     Mode for getting message (decode|encode)
	* 
	* @return  string  Return decoded|encoded message
	*/
	static function getMessage($message, $mode = 'encode')
	{
		$result = '';
		$amessage = str_split($message);
		$count_symbs = strlen(self::$symbols);

		foreach ($amessage as $symbol)
		{
			if ($num = strpos(self::$symbols, $symbol))
			{
				if ($mode == 'encode')
				{
					$num = $num + self::$key;
				}
				elseif ($mode == 'decode')
				{
					$num = $num - self::$key;
				}

				if ($num >= $count_symbs)
				{
					$num = $num - $count_symbs;    
				}
				elseif  ($num < 0)
				{
					$num = $num + $count_symbs;
				}

				$result = $result . self::$symbols[$num];
			}
			else
			{
				$result = $result . $symbol;
			}
		}

		return $result;
	}
}
