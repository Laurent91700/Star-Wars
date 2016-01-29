var gulp = require('gulp'),
    sass = require('gulp-sass'),
    jquery = require('gulp-jquery'),
    minify = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');

var path = {
    'resources':{
        'sass':'./resources/assets/sass',
        'jquery':'./resources/assets/jquery'
    },
    'public':{
        'css':'./public/assets/css',
        'jquery':'./public/assets/jquery'
    },
    'sass':'./resources/assets/sass/**/*.scss',
    'jquery':'./resources/assets/jquery/*.js'
}

gulp.task('sass_task',function()
{
    return gulp.src(path.resources.sass + '/app.scss')
        .pipe(sass({onError:console.error.bind(console, 'SASS ERROR')}))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css))
});

gulp.task('bootstrap_task',function()
{
    return gulp.src(path.resources.sass + '/bootstrap/css/bootstrap.css')
        .pipe(sass({onError:console.error.bind(console, 'SASS ERROR')}))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css))
});
gulp.task('jquery_task',function()
{
    return gulp.src(path.resources.jquery + '/*.js')
        .pipe(uglify({onError:console.error.bind(console, 'JS ERROR')}))
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.jquery))
});
gulp.task('watch', function(){
    gulp.watch(path.sass,['sass_task','bootstrap_task']);
    //on peut declancher plusieurs task par ex en plus :
    gulp.watch(path.jquery,['jquery_task']);
});

//lancement de la task par default
gulp.task('default',['watch']); //gulp.task('default',['watch'],'phpunit');
//pour lancer une task specifique
//$ gulp watch
//pour lancer les tasks par defaut
//$ gulp
