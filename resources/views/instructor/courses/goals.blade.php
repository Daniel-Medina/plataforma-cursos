<x-instructor-layout :course="$course">



    <div>
        @livewire('instructor.course-goals', ['course' => $course], key('course-goals' . $course->id))
    </div>
    <div class="my-8">
        @livewire('instructor.course-requiroments', ['course' => $course], key('course-requiroments' . $course->id))
    </div>
    <div>
        @livewire('instructor.course-audience', ['course' => $course], key('course-audience' . $course->id))
    </div>

</x-instructor-layout>