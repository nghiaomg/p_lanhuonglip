<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(){
		for ($i=0; $i < 6; $i++) { 
			$data = [
				'fullname' 			=> $this->generate_string(mt_rand(3,4))." ".$this->generate_string(mt_rand(3,8)),
				'phone'    			=> $this->randomNumberSequence(),
				'yearofbirth'    	=> mt_rand(1970,2010),
				'address'    	=> $this->generate_string(mt_rand(3,4)).", ".$this->generate_string(mt_rand(4,6)),
				'email'    			=> $this->generate_string().'@gmail.com',
				'created_at'    	=> date('Y-m-d H:i:s'),
				'updated_at'    	=> date('Y-m-d H:i:s'),
			];

			$this->db->table('tbl_candidate')->insert($data);
		}
    }

	public function generate_string($strength = 16) {
		$input = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$input_length = strlen($input);
		$random_string = '';
		for($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
	
		return $random_string;
	}
	public function randomNumberSequence($requiredLength = 7, $highestDigit = 8) {
		$sequence = '';
		for ($i = 0; $i < $requiredLength; ++$i) {
			$sequence .= mt_rand(0, $highestDigit);
		}
		$numberPrefixes = ['0812', '0813', '0814', '0815', '0816', '0817', '0818', '0819', '0909', '0908'];
		return $numberPrefixes[array_rand($numberPrefixes)].$sequence;
	}
	
}
