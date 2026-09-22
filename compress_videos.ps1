$sourceDir = "C:\Users\User\Documents\GitHub\history\Friday-Night-Funkin-html-main\videos"
$destDir = "C:\Users\User\Documents\GitHub\history\Friday-Night-Funkin-html-main\html5_build\assets\videos\videos"

# Compress stressCutscene
ffmpeg -y -i "$sourceDir\stressCutscene.mp4" -vcodec libx264 -crf 28 -preset fast "$destDir\stressCutscene.mkv"

# Compress stressCutscene-censored
ffmpeg -y -i "$sourceDir\stressCutscene-censored.mp4" -vcodec libx264 -crf 28 -preset fast "$destDir\stressCutscene-censored.mkv"

# Compress darnellCutscene (original was mp4)
ffmpeg -y -i "$sourceDir\darnellCutscene.mp4" -vcodec libx264 -crf 28 -preset fast "$destDir\darnellCutscene.mp4"
