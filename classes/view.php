<?php

namespace cinema;

class View {

	public static function cinema($name) {

		$o = "";

		$o .= '<div id="cinema_wrapper">';

			$o .= '<div class="cinema_player_title">' . Text::title() . '</div>';

			// CREATE PLAYER
			$o .= '<div id="cinema_player" class="cinema_player_player"></div>';
			$o .= '<script src="https://player.vimeo.com/api/player.js"></script>';

			// local control
			// $o .= '<div><span class="cinema_start">START</span> <span class="cinema_stop">STOP</span></div>';

			$o .= '<div class="cinema_player_status">Player-Status</div>';

			$o .= '<div style="clear:both;"></div>';

			// CHAT section
			$o .= '<div id="cinema_chat" class="cinema_chat">';

				$o .= '<div id="cinema_chat_hide" class="cinema_chat_button">Chat</div>';

				$o .= '<div class="cinema_chat_text">Nachricht <input type="text" class="cinema_chat_input"></div>';

				$o .= '<div class="cinema_chat_list">';

				$o .= '</div>';
			$o .= '</div>';
		$o .= '</div>';

		return $o;
	}


	public static function host($name) {

		// TITLE
		$o = '<div class="cinema_host_title">Cinema Host</div>';

		$o .= '<div>';
			$o .= '<span class="cinema_host_clients"></span>';
		$o .= ' verbundene Zuseher</div>';

		// CREATE PLAYER
		$o .= '<div id="cinema_player" class="cinema_host_player"></div>';
		$o .= '<script src="https://player.vimeo.com/api/player.js"></script>';

		// LOAD FILM
		$o .= '<div class="cinema_host_vid">Video ID</div>';
		$o .= '<div class="cinema_host_load cinema_button">Film laden</div>';

		// UNLOAD FILM
		$o .= '<div class="cinema_host_stop cinema_button cinema_stop">Beenden</div>';
		$o .= '<div style="clear:left;"></div>';

		// PLAY
		$o .= '<div class="cinema_host_play cinema_button cinema_play" vid="329757457">START</div>';
		// PAUSE
		$o .= '<div class="cinema_host_pause cinema_button cinema_pause">PAUSE</div>';
		$o .= '<div style="clear:left;"></div>';

		// STATI
		$o .= '<div class="cinema_player_status">Player-Status</div>';
		$o .= '<div style="clear:left;"></div>';
		// $o .= '<div class="cinema_host_status">Host-Status</div>';
		// $o .= '<div style="clear:both;"></div>';

		// CHAT section
		$o .= '<div class="cinema_chat">';

			$o .= '<div class="cinema_chat_text">Nachricht <input type="text" class="cinema_chat_input"></div>';

			$o .= '<div class="cinema_chat_list">';

			$o .= '</div>';
		$o .= '</div>';
		return $o;
	}

}