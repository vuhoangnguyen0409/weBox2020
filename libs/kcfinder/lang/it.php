CKEditor 4 Changelog
====================

## CKEditor 4.4.3

**Security Updates:**

* Fixed XSS vulnerability in the Preview plugin reported by Mario Heiderich of [Cure53](https://cure53.de/).

**An upgrade is highly recommended!**

New Features:

* [#12164](http://dev.ckeditor.com/ticket/12164): Added the "Justify" option to the "Horizontal Alignment" drop-down in the Table Cell Properties dialog window.

Fixed Issues:

* [#12110](http://dev.ckeditor.com/ticket/12110): Fixed: Editor crash after deleting a table. Thanks to [Alin Purcaru](https://github.com/mesmerizero)!
* [#11897](http://dev.ckeditor.com/ticket/11897): Fixed: **Enter** key used in an empty list item creates a new line instead of breaking the list. Thanks to [noam-si](https://github.com/noam-si)!
* [#12140](http://dev.ckeditor.com/ticket/12140): Fixed: Double-clicking linked widgets opens two dialog windows.
* [#12132](http://dev.ckeditor.com/ticket/12132): Fixed: Image is inserted with `width` and `height` styles even when they are not allowed.
* [#9317](http://dev.ckeditor.com/ticket/9317): [IE] Fixed: [`config.disableObjectResizing`](http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-disableObjectResizing) does not work on IE. **Note**: We were not able to fix this issue on IE11+ because necessary events stopped working. See a [last resort workaround](http://dev.ckeditor.com/ticket/9317#comment:16) and make sure to [support our complaint to Microsoft](https://connect.microsoft.com/IE/feedback/details/742593/please-respect-execcommand-enableobjectresizing-in-contenteditable-elements).
* [#9638](http://dev.ckeditor.com/ticket/9638): Fixed: There should be no information about accessibility help available under the *Alt+0* keyboard shortcut if the [Accessibility Help](http://ckeditor.com/addon/a11yhelp) plugin is not available.
* [#8117](http://dev.ckeditor.com/ticket/8117) and [#9186](http://dev.ckeditor.com/ticket/9186): Fixed: In HTML5 `<meta>` tags should be allowed everywhere, including inside the `<body>` element.
* [#10422](http://dev.ckeditor.com/ticket/10422): Fixed: [`config.fillEmptyBlocks`](http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-fillEmptyBlocks) not working properly if a function is specified.

## CKEditor 4.4.2

Important Notes:

* The CKEditor testing environment is now publicly available. Read more about how to set up the environment and execute tests in the [CKEditor Testing Environment](http://docs.ckeditor.com/#!/guide/dev_tests) guide.
	Please note that the [`tests/`](https://github.com/ckeditor/ckeditor-dev/tree/master/tests) directory which contains editor tests is not available in release packages. It can only be found in the development version of CKEditor on [GitHub](https://github.com/ckeditor/ckeditor-dev/).

New Features:

* [#11909](http://dev.ckeditor.com/ticket/11909): Introduced a parameter to prevent the [`editor.setData()`](http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData) method from recording undo snapshots.

Fixed Issues:

* [#11757](http://dev.ckeditor.com/ticket/11757): Fixed: Imperfections in the [Moono](http://ckeditor.com/addon/moono) skin. Thanks to [danyaPostfactum](https://github.com/danyaPostfactum)!
* [#10091](http://dev.ckeditor.com/ticket/10091): Blockquote should be treated like an object by the styles system. Thanks to [dan-james-deeson](https://github.com/dan-james-deeson)!
* [#11478](http://dev.ckeditor.com/ticket/11478): Fixed: Issue with passing jQuery objects to [adapter](http://docs.ckeditor.com/#!/guide/dev_jquery) configuration.
* [#10867](http://dev.ckeditor.com/ticket/10867): Fixed: Issue with setting encoded URI as image link.
* [#11983](http://dev.ckeditor.com/ticket/11983): Fixed: Clicking a nested widget does not focus it. Additionally, performance of the [`widget.repository.getByElement()`](http://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget.repository-method-getByElement) method was improved.
* [#12000](http://dev.ckeditor.com/ticket/12000): Fixed: Nested widgets should be initialized on [`editor.setData()`](http:/=> "I files nella Clipboard non sono leggibili.",
    "{count} files in the Clipboard are not readable. Do you want to copy the rest?" => "{count} files nella Clipboard non sono leggibili. Copiare il resto?",
    "The files in the Clipboard are not movable." => "I files nella Clipboard non sono spostabili.",
    "{count} files in the Clipboard are not movable. Do you want to move the rest?" => "{count} files nella Clipboard non sono spostabili. Spostare il resto?",
    "The files in the Clipboard are not removable." => "I files nella Clipboard non si possono rimuovere.",
    "{count} files in the Clipboard are not removable. Do you want to delete the rest?" => "{count} files nella Clipboard non si possono rimuovere. Cancellare il resto?",
    "The selected files are not removable." => "Il file selezionato non è rimovibile.",
    "{count} selected files are not removable. Do you want to delete the rest?" => "{count} files selezionati non sono rimovibili. Cancellare il resto?",
    "Are you sure you want to delete all selected files?" => "Sei sicuro che vuoi cancellare tutti i files selezionati?",
    "Failed to delete {count} files/folders." => "Cancellazione fallita {count} files/cartelle.",
    "A file or folder with that name already exists." => "Un file o cartella con questo nome già esiste.",
    "Copy files here" => "Copia i files qui",
    "Move files here" => "Sposta i files qui",
    "Delete files" => "Cancella i files",
    "Clear the Clipboard" => "Pulisci la Clipboard",
    "Are you sure you want to delete all files in the Clipboard?" => "Sei sicuro che vuoi cancellare tutti i files dalla Clipboard?",
    "Copy {count} files" => "Copio {count} files",
    "Move {count} files" => "Sposto {count} files",
    "Add to Clipboard" => "Aggiungi alla Clipboard",
    "Inexistant or inaccessible folder." => "La cartella non esiste o è inacessibile.",
    "New folder name:" => "Nuovo nome della cartella:",
    "New file name:" => "Nuovo nome del file:",
    "Upload" => "Carica",
    "Refresh" => "Aggiorna",
    "Settings" => "Preferenze",
    "Maximize" => "Massimizza",
    "About" => "Chi siamo",
    "files" => "files",
    "selected files" => "files selezionati",
    "View:" => "Vista:",
    "Show:" => "Mostra:",
    "Order by:" => "Ordina per:",
    "Thumbnails" => "Miniature",
    "List" => "Lista",
    "Name" => "Nome",
    "Type" => "Tipo",
    "Size" => "Grandezza",
    "Date" => "Data",
    "Descending" => "Discendente",
    "Uploading file..." => "Carico file...",
    "Loading image..." => "Caricamento immagine...",
    "Loading folders..." => "Caricamento cartella...",
    "Loading files..." => "Caricamento files...",
    "New Subfolder..." => "Nuova sottocartella...",
    "Rename..." => "Rinomina...",
    "Delete" => "Elimina",
    "OK" => "OK",
    "Cancel" => "Cancella",
    "Select" => "Seleziona",
    "Select Thumbnail" => "Seleziona miniatura",
    "Select Thumbnails" => "Seleziona miniature",
    "View" => "Vista",
    "Download" => "Scarica",
    "Download files" => "Scarica files",
    "Clipboard" => "Clipboard",
    "Checking for new version..." => "Controllo nuova versione...",
    "Unable to connect!" => "Connessione impossibile",
    "Download version {version} now!" => "Prelevo la versione {version} adesso!",
    "KCFinder is up to date!" => "KCFinder è aggiornato!",
    "Licenses:" => "Licenze:",
    "Attention" => "Attenzione",
    "Question" => "Domanda",
    "Yes" => "Si",
    "No" => "No",
    "You cannot rename the extension of files!" => "Non puoi rinominare l'estensione del file!",
    "Uploading file {number} of {count}... {progress}" => "Caricmento del file {number} di {count}... {progress}",
    "Failed to upload {filename}!" => "Il caricamento del file {filename} è fallito ",
    "Close" => "Chiudi",
    "Previous" => "Precedente",
    "Next" => "Successivo",
    "Confirmation" => "Conferma",
    "Warning" => "Attenzione",
);

?>