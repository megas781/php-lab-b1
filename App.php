<?

class App {
    public function getScriptFilename() {
        preg_match('*/[^/]+$*', $_SERVER['SCRIPT_NAME'], $matches);
        return $matches[0];
    }
}

$app = new App;
