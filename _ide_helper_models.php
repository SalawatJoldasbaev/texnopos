<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $date
 * @property string $body
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereViews($value)
 * @mixin \Eloquent
 */
	class IdeHelperBlog {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $phone
 * @property string $working_hours
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWorkingHours($value)
 * @mixin \Eloquent
 */
	class IdeHelperCompany {}
}

namespace App\Models{
/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $teacher_id
 * @property string $image
 * @property string $name
 * @property string $lesson_duration
 * @property int $number_pupils
 * @property string $description
 * @property array|null $who_for
 * @property array|null $advantages
 * @property int $module_count
 * @property int $lessons_count
 * @property string $course_duration
 * @property array $topics
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereAdvantages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereLessonDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereLessonsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereModuleCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereNumberPupils($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTopics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereWhoFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperCourse {}
}

namespace App\Models{
/**
 * App\Models\CourseRequest
 *
 * @property int $id
 * @property int $course_id
 * @property string $phone
 * @property string $name
 * @property string|null $message
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseRequest withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperCourseRequest {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property mixed $0
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperEmployee {}
}

namespace App\Models{
/**
 * App\Models\Feadback
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Feadback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feadback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feadback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feadback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feadback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feadback whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperFeadback {}
}

namespace App\Models{
/**
 * App\Models\Graduator
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Graduator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Graduator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Graduator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Graduator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Graduator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Graduator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperGraduator {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $image
 * @property string $uploadedby
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUploadedby($value)
 * @mixin \Eloquent
 */
	class IdeHelperImage {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property int $employee_id
 * @property string $title
 * @property string $image
 * @property string $date
 * @property string $body
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereViews($value)
 * @mixin \Eloquent
 */
	class IdeHelperNews {}
}

namespace App\Models{
/**
 * App\Models\Portfolio
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $url
 * @property string $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUrl($value)
 * @mixin \Eloquent
 */
	class IdeHelperPortfolio {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $description
 * @property string $image
 * @property array $technologies
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTechnologies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Service withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperService {}
}

namespace App\Models{
/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperTeacher {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property string $image
 * @property string $full_name
 * @property string $profession
 * @property string $description
 * @property bool $is_ceo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereIsCeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTeam {}
}

namespace App\Models{
/**
 * App\Models\Telegram
 *
 * @property int $id
 * @property int $telegram_id
 * @property string $lang
 * @property string|null $step
 * @property array|null $info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram query()
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereTelegramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Telegram whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTelegram {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

