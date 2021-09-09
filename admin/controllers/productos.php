<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'productos' )
	->fields(
		Field::inst( 'id' )
		->validator( Validate::numeric() )
		->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'nombre' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Debe ingresar un nombre' )	
			) ),
		// Field::inst( 'last_name' )
		// 	->validator( Validate::notEmpty( ValidateOptions::inst()
		// 		->message( 'A last name is required' )	
		// 	) ),
		// Field::inst( 'position' ),
		// Field::inst( 'email' )
		// 	->validator( Validate::email( ValidateOptions::inst()
		// 		->message( 'Please enter an e-mail address' )	
		// 	) ),
		// Field::inst( 'office' ),
		// Field::inst( 'extn' ),
		Field::inst( 'precio' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'stock' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'descripcion' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Debe ingresar una descripción' )	
			) )
		// Field::inst( 'start_date' )
		// 	->validator( Validate::dateFormat( 'Y-m-d' ) )
		// 	->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
		// 	->setFormatter( Format::dateFormatToSql('Y-m-d' ) )
	)
	 ->join(
        Mjoin::inst( 'files' )
            ->link( 'productos.id', 'productos_files.producto_id' )
            ->link( 'files.id', 'productos_files.file_id' )
            ->fields(
                Field::inst( 'id' )
                    ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/uploads/__ID__.__EXTN__' )
                        ->db( 'files', 'id', array(
                            'filename'    => Upload::DB_FILE_NAME,
                            'filesize'    => Upload::DB_FILE_SIZE,
                            'web_path'    => Upload::DB_WEB_PATH,
                            'system_path' => Upload::DB_SYSTEM_PATH
                        ) )
                        ->validator( Validate::fileSize( 5000000, 'Files must be smaller that 5M' ) )
                        ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif' ), "Please upload an image" ) )
                    )
            )
    )
	->debug(true)
	->process( $_POST )
	->json();
