<?php

class NumerosRomanos {

	public $tabela = array("I" => 1, "V" => 5, "X" => 10, "L" => 50,"C"=>100, "D"=> 500, "M"=>1000);
	public $tabela2 = array(0 => 1, 1 =>5, 2 => 10, 3 => 50, 4 => 100, 5 => 500 , 6 => 1000);
	public $tabela3 = array(0 => "I", 1 =>"V", 2 => "X", 3 => "L", 4 => "C", 5 => "D" , 6 => "M");
	public $tabela4 = array(1 => "I", 5 =>"V", 10 => "X", 50 => "L", 100 => "C", 500 => "D" , 1000 => "M");
	function converterParaDecimal($numero) {
		$numero = strtoupper($numero);

		$resultado = 0;
		$tamanho = strlen($numero);
		for($i=$tamanho; $i>=0; $i--) {
			if($this->tabela[$numero[$i]] <= $this->tabela[$numero[$i-1]]) {
				$resultado += $this->tabela[$numero[$i]];
			} else if ($this->tabela[$numero[$i]] > $this->tabela[$numero[$i-1]]) {
				$resultado += $this->tabela[$numero[$i]] - $this->tabela[$numero[$i-1]];
				$i--;
			}
		}
		return $resultado;


	}

	function converterParaRomano($decimal) {
		//		return 'I';
		//		$resultado = '';
		//		$resto = $decimal % 5;
		//		if($resto == 4) {
		//			return 'IV';
		//		} else {
		//			for($i = $resto; $i >= 0; $i--) {
		//				$resultado .= 'I';
		//			}
		//		}

		//		$string = "";
		//		//		echo "a";
		//		$resultado = 1;
		//		for ($i=6; $i >= 0; $i--){
		//			//			echo $decimal." / ".$this->tabela2[$i]."<br/>";
		//			$resultado = $decimal / $this->tabela2[$i];
		//			$resultado = floor($resultado);
		//			//			$resultado = round($resultado);
		//			//			echo $resultado."<br/>";
		//			$decimal_antigo = $decimal;
		//			$decimal = $decimal % $this->tabela2[$i];
		//			//			echo $decimal."<br/>";
		//			if($resultado > 0){
		//				if(($decimal == 3) || (($decimal == 0) && ($decimal_antigo != $decimal) && ($i!=0))){
		//					$string = $string . $this->tabela3[$i].$this->tabela3[$i+1];
		//				}
		//				else{
		//					for($x = 0; $x < $resultado; $x++)
		//					$string = $string . $this->tabela3[$i];
		//				}
		//			}
		//
		//		}
		//		return $string;
			
		$resultado = '';
		$resultado .= $this->funcao_auxiliar_converterParaRomano($decimal, 'M', 'D', 'C');
		$resultado .= $this->funcao_auxiliar_converterParaRomano($decimal, 'C', 'L', 'X');
		$resultado .= $this->funcao_auxiliar_converterParaRomano($decimal, 'X', 'V', 'I');
		return $resultado;
	}

	function funcao_auxiliar_converterParaRomano($decimal, $max, $meio, $menor) {
		$max_max = $decimal % $max;
		$max_meio = $decimal % $meio;
		$num_meio = $max_max % $meio;

		$resultado_parcial = '';
		if($num_meio == 0) {
			if(($max_meio >= $this->tabela[$meio] - $this->tabela[$menor]) && ($max_meio < $this->tabela[$meio])) {
				$resultado_parcial = $menor . $meio;
			} else {
				for($i = $this->tabela[$meio]; $i >= $this->tabela[$menor]; $i -= $this->tabela[$menor]){
					$resultado_parcial .= $menor;
				}
			}
		} else {
			if(($max_meio >= $this->tabela[$meio] - $this->tabela[$menor]) && ($max_meio < $this->tabela[$meio])) {
				$resultado_parcial = $menor . $maior;
			} else {
				$resultado_parcial = $meio;
				for($i = $this->tabela[$meio]; $i >= $this->tabela[$menor]; $i -= $this->tabela[$menor]){
					$resultado_parcial .= $menor;
				}
			}
		}
		return $resultado_parcial;
	}


	function numeroValido($numero){
		$tamanho = strlen($numero);
		for($i=0; $i<$tamanho; $i++){
			if (array_key_exists($numero[$i], $this->tabela) == false) {
				return false;
			}
		}
		return true;
	}
}

$print = new NumerosRomanos();
echo '<br/>';
echo $print->converterParaRomano(7);
echo '<br/>';
echo $print->converterParaRomano(1);

?>