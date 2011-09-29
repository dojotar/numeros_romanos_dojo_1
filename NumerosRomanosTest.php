<?php

require_once '../src/NumerosRomanos.php';

class NumerosRomanosTest extends PHPUnit2_Framework_TestCase {

	public $numerosRomanos;

	public function setUp() {
		$this->numerosRomanos = new NumerosRomanos();
	}


	public function test_deve_retornar_1() {
		$this->assertEquals(1, $this->numerosRomanos->converterParaDecimal("I"));
	}

	public function test_deve_retornar_2() {
		$this->assertEquals(2, $this->numerosRomanos->converterParaDecimal("II"));
	}

	public function test_deve_retornar_3() {
		$this->assertEquals(3, $this->numerosRomanos->converterParaDecimal("III"));
	}

	public function test_deve_retornar_4() {
		$this->assertEquals(4, $this->numerosRomanos->converterParaDecimal("IV"));
	}

	public function test_deve_retornar_5() {
		$this->assertEquals(5, $this->numerosRomanos->converterParaDecimal("V"));
	}

	public function test_deve_retornar_6() {
		$this->assertEquals(6, $this->numerosRomanos->converterParaDecimal("VI"));
	}

	public function test_deve_retornar_7() {
		$this->assertEquals(7, $this->numerosRomanos->converterParaDecimal("VII"));
	}
	public function test_deve_retornar_52() {
		$this->assertEquals(52, $this->numerosRomanos->converterParaDecimal("LII"));
	}

	public function test_deve_retornar_152() {
		$this->assertEquals(152, $this->numerosRomanos->converterParaDecimal("CLII"));
	}

	public function test_deve_retornar_504() {
		$this->assertEquals(504, $this->numerosRomanos->converterParaDecimal("DIV"));
	}

	public function test_existe_no_array_A(){
		$this->assertEquals(false, $this->numerosRomanos->numeroValido("A"));
	}
	public function test_existe_no_array_L(){
		$this->assertEquals(true, $this->numerosRomanos->numeroValido("L"));
	}
	public function test_existe_no_array_LA(){
		$this->assertEquals(false, $this->numerosRomanos->numeroValido("LA"));
	}
	
	public function test_deve_retornar_I() {
		$this->assertEquals("I", $this->numerosRomanos->converterParaRomano(1));
	}
	public function test_deve_retornar_VII() {
		$this->assertEquals("VII", $this->numerosRomanos->converterParaRomano(7));
	}
	public function test_deve_retornar_DXXXV() {
		$this->assertEquals("DXXXV", $this->numerosRomanos->converterParaRomano(535));
	}
	public function test_deve_retornar_IV() {
		$this->assertEquals("IV", $this->numerosRomanos->converterParaRomano(4));
	}

	

}

?>