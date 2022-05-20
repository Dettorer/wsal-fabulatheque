<?php
/**
 * Our list of events.
 *
 * @package wsal
 */

// phpcs:disable WordPress.WP.I18n.UnorderedPlaceholdersText 
// phpcs:disable WordPress.WP.I18n.MissingTranslatorsComment

$custom_alerts = array(
    __('LearnPress Events', 'wsal-fabulatheque') => array(
        __('Courses', 'wsal-fabulatheque') => array(
            array(
                1010000, # A user enrolled in a course
                WSAL_MEDIUM,
                __('User enrolled in a course', 'wsal-fabulatheque'),
                __('User %UserId% enrolled in course %CourseId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'learnpress',
                'course-enrolled',
            ),

            array(
                1010001, # A user completed a lesson
                WSAL_LOW,
                __('User completed a lesson', 'wsal-fabulatheque'),
                __('User %UserId% completed the lesson %LessonId% in course %CourseId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'learnpress',
                'lesson-completed',
            ),

            array(
                1010002, # A user finished a course
                WSAL_LOW,
                __('User finished a course', 'wsal-fabulatheque'),
                __('User %UserId% finished the course %CourseId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'learnpress',
                'course-finished',
            ),
        ),

        __('Quizzes', 'wsal-fabulatheque') => array(
            array(
                1010003, # A user started a quiz
                WSAL_LOW,
                __('User started a quiz', 'wsal-fabulatheque'),
                __('User %UserId% started the quiz %QuizId% in the course %CourseId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'learnpress',
                'quiz-started',
            ),

            array(
                1010004, # A user finished a quiz
                WSAL_LOW,
                __('User finished a quiz', 'wsal-fabulatheque'),
                __('User %UserId% finished the quiz %QuizId% in the course %CourseId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'learnpress',
                'quiz-finished',
            ),

            array(
                1010005, # A user retried a quiz
                WSAL_LOW,
                __('User retried a quiz', 'wsal-fabulatheque'),
                __('User %UserId% retried the quiz %QuizId% in the course %CourseId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'learnpress',
                'quiz-retried',
            ),
        )
    )
);
