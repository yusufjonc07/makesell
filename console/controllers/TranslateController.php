<?php 

namespace console\controllers;

use yii\console\Controller;
use yii\helpers\FileHelper;

class TranslateController extends Controller
{
    /**
     * Extract all Yii::t texts from view files.
     *
     * @param string $directory Path to the views directory (default: @backend/views).
     * @param string $outputFile Path to the output file (default: @runtime/translations.txt).
     */
    public function actionExtract($directory = '@backend/views', $outputFile = '@runtime/translations.txt')
    {
        $directory = \Yii::getAlias($directory);
        $outputFile = \Yii::getAlias($outputFile);

        if (!is_dir($directory)) {
            $this->stdout("The directory '$directory' does not exist.\n", \yii\helpers\Console::FG_RED);
            return;
        }

        $translations = [];

        // Find all PHP files in the directory
        $files = FileHelper::findFiles($directory, ['only' => ['*.php']]);
        foreach ($files as $file) {
            $content = file_get_contents($file);

            // Match Yii::t calls
            preg_match_all('/Yii::t\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]([^\'"]+)[\'"]\s*/', $content, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $category = $match[1];
                $message = $match[2];
                $translations[$category][] = $message;
            }
        }

        // Write translations to the output file
        $output = "<?php array(\n";
        foreach ($translations as $category => $messages) {
            $output .= "Category: $category\n";
            $output .= implode("\n", array_unique($messages)) . "\n\n";
        }

        file_put_contents($outputFile, $output);
        $this->stdout("Translations extracted to '$outputFile'\n", \yii\helpers\Console::FG_GREEN);
    }
}