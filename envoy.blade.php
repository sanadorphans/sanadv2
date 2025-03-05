@servers(['main' => ['root@153.92.210.80']])

@setup
    $repository = 'https://github.com/sanadorphans/sanadv2.git';
    $releases_dir = 'releases';
    $release = date('YmdHis');
    $new_release_dir = $releases_dir .'/'. $release;
    $existing_release_dir = $releases_dir .'/'. '20240130121652';
    $branch = 'main';
@endsetup

@story('deploy', ['on' => 'main'])
    clone_repository
    run_composer
    update_symlinks
    {{-- update_symlinks2 --}}
    {{-- test --}}
@endstory

@task('test')
    ln -nfs /home/sanadorphans.org/releases/20231105064358/public/css /home/sanadorphans.org/public_html/css
@endtask

@task('clone_repository')
    cd /home/sanadorphans.org
    echo 'Cloning repository'
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }}
    git clone --depth 1 --branch {{ $branch }} {{ $repository }} {{ $new_release_dir }}
    cd {{ $new_release_dir }}
    git reset --hard {{ $commit }}
@endtask

@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    echo 'Linking .env file'
    ln -nfs /home/sanadorphans.org/.env /home/sanadorphans.org/{{ $new_release_dir }}
    cd /home/sanadorphans.org/{{ $new_release_dir }}
    echo "Starting composer"
    composer install
    echo "finishing composer"
@endtask

@task('update_symlinks')
    echo "Linking storage directory"
    rm -rf /home/sanadorphans.org/{{ $new_release_dir }}/storage
    ln -nfs /home/sanadorphans.org/storage /home/sanadorphans.org/{{ $new_release_dir }}/storage
    echo 'Linking current release'
    ln -nfs /home/sanadorphans.org/{{ $new_release_dir }} /home/sanadorphans.org/current
    echo 'going to current'
    cd /home/sanadorphans.org/current
    ln -nfs /home/sanadorphans.org/{{ $new_release_dir }}/public/assets /home/sanadorphans.org/public_html/assets
    ln -nfs /home/sanadorphans.org/{{ $new_release_dir }}/public/img /home/sanadorphans.org/public_html/img
    ln -nfs /home/sanadorphans.org/{{ $new_release_dir }}/public/css /home/sanadorphans.org/public_html/css
    ln -nfs /home/sanadorphans.org/{{ $new_release_dir }}/public/js /home/sanadorphans.org/public_html/js
    ln -nfs /home/sanadorphans.org/{{ $new_release_dir }}/public/fonts /home/sanadorphans.org/public_html/fonts
    php artisan storage:link
    php artisan migrate
@endtask

@task('update_symlinks2')
    echo "Linking storage directory"
    rm -rf /home/sanadorphans.org/{{ $existing_release_dir }}/storage
    ln -nfs /home/sanadorphans.org/storage /home/sanadorphans.org/{{ $existing_release_dir }}/storage
    echo 'Linking current release'
    ln -nfs /home/sanadorphans.org/{{ $existing_release_dir }} /home/sanadorphans.org/current
    echo 'going to current'
    cd /home/sanadorphans.org/current
    ln -nfs /home/sanadorphans.org/{{ $existing_release_dir }}/public/assets /home/sanadorphans.org/public_html/assets
    ln -nfs /home/sanadorphans.org/{{ $existing_release_dir }}/public/img /home/sanadorphans.org/public_html/img
    ln -nfs /home/sanadorphans.org/{{ $existing_release_dir }}/public/css /home/sanadorphans.org/public_html/css
    ln -nfs /home/sanadorphans.org/{{ $existing_release_dir }}/public/js /home/sanadorphans.org/public_html/js
    ln -nfs /home/sanadorphans.org/{{ $existing_release_dir }}/public/fonts /home/sanadorphans.org/public_html/fonts
    php artisan storage:link
    php artisan migrate
@endtask
