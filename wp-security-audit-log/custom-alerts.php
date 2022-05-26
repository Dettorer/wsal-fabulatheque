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
        ),
    ),

    __('GamiPress Events', 'wsal-fabulatheque') => array(
        __('Points', 'wsal-fabulatheque') => array(
            array(
                1020000, # A user was awarded points
                WSAL_MEDIUM,
                __('User was awarded GamiPress points', 'wsal-fabulatheque'),
                __('User %UserId% was awareded %PointsCount% points of type %PointsType% for the reason %Reason%, these points are related to the achievement %RelatedAchievement%', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'points-awarded',
            ),

            array(
                1020001, # A user was deducted points
                WSAL_MEDIUM,
                __('User was deducted GamiPress points', 'wsal-fabulatheque'),
                __('User %UserId% was deducted %PointsCount% points of type %PointsType% for the reason %Reason%, these points are related to the achievement %RelatedAchievement%', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'points-deducted',
            ),
        ),

        __('Rank', 'wsal-fabulatheque') => array(
            array(
                1020002, # A user was awarded a rank
                WSAL_MEDIUM,
                __('User was awarded a GamiPress rank', 'wsal-fabulatheque'),
                __('User %UserId% was awareded the rank %RankId%, this rank is related to the achievement %RelatedAchievement%', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'rank-awarded',
            ),

            array(
                1020003, # A user was revoked a rank
                WSAL_MEDIUM,
                __('User had a GamiPress rank revoked', 'wsal-fabulatheque'),
                __('User %UserId% had the rank %RankId% revoked, their new rank is %NewRankId%. The rank that was revoked is related to the achievement %RelatedAchievement%', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'rank-revoked',
            ),

            array(
                1020006, # A user had their rank updated
                WSAL_MEDIUM,
                __('User had their GamiPress rank updated', 'wsal-fabulatheque'),
                __('User %UserId% had their rank updated from %OldRank% to %NewRank%, this rank is related to the achievement %RelatedAchievement%', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'rank-updated',
            ),
        ),

        __('Achievement', 'wsal-fabulatheque') => array(
            array(
                1020004, # A user was awarded an achievement
                WSAL_MEDIUM,
                __('User was awarded a GamiPress achievement', 'wsal-fabulatheque'),
                __('User %UserId% was awareded the achievement %AchievementId%', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'achievement-awarded',
            ),

            array(
                1020005, # A user had an achievement revoked
                WSAL_MEDIUM,
                __('User had a GamiPress achievement revoked', 'wsal-fabulatheque'),
                __('User %UserId% had the achievement %AchievementId% revoked', 'wsal-fabulatheque'),
                array(),
                array(),
                'gamipress',
                'achievement-revoked',
            ),
        ),
    ),
);
