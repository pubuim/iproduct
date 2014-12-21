var Components = {};
var Services = {};

Services.Post = {
  up: function (id, cb) {
    this.request(id + '/up', {method: 'POST'}, function (post) {
      cb(post.digg_count);
    })
  },

  down: function (id, cb) {
    this.request(id + '/down', {method: 'POST'}, function (post) {
      cb(post.digg_count);
    })
  },

  checkUrl: function (url, cb) {
    this.request('url_check/?url=' + encodeURIComponent(url), {method: 'GET'}, function (data) {
      cb(data);
    })
  },

  request: function (path, option, success, fail) {
    if (typeof option === "function") {
      success = option;
      fail = success;
      option = {}
    }

    option = option || {}

    $.ajax({
      url: "/v1/posts/" + path,
      type: option.method || "GET",
      data: option.data,
      dataType: "json"
    })
      .done(success)
      .fail(fail)
  }
}

Services.Posts = {
  fetch: function (start, success, fail) {
    $.ajax({
      url: "/posts?start=" + start,
      type: "GET",
      dataType: "html"
    })
      .done(success)
      .fail(fail)
  }
}

Services.Comment = {
  create: function (data, success, fail) {
    $.ajax({
      url: "/v1/comments?html=1",
      data: data,
      type: "POST",
      dataType: "html"
    })
      .done(success)
      .fail(fail)
  }
}

/**
 * 加载更多
 */
Components.LoadMorePosts = function () {
  $(this).click(function () {
    var lastDay = $($(this).data('posts-start')).text();
    var postContainer = $($(this).data('posts-container'));

    Services.Posts.fetch(lastDay, function (html) {
      postContainer.append(html);
    }, function (err) {
      alert(err)
    })
  })
}

Components.CreateComment = function () {
  $(this).click(function () {
    var contentContainer = $($(this).data('content-container'));
    var postId = $(this).data('post-id');
    var commentsContainer = $($(this).data('comments-container'));
    var self = this;

    if (!contentContainer.val()) {
      alert('输入后再提交哦！')
      return;
    }

    $(this).attr('disabled', 'true');
    Services.Comment.create({post_id: postId, content: contentContainer.val()}, function (html) {
      $(self).removeAttr('disabled');
      commentsContainer.append(html);
      contentContainer.val('');
    }, function (err) {
      $(self).removeAttr('disabled');
      alert(err)
    })
  })
}

/**
 * Url 获取标题
 */
Components.UrlCheck = function () {
  var self = this;
  var titleContainer = $($(this).data('title-container'))
  var contentContainer = $($(this).data('content-container'))

  $(this).blur(function () {
    var url = $(self).val();
    Services.Post.checkUrl(url, function (data) {
      if (data.title) titleContainer.val(data.title + ' ' + titleContainer.val());
      if (data.content) contentContainer.val(data.content + ' ' + contentContainer.val());
    })
  })
}

/**
 * Dom ready
 */
$(document).ready(function () {
  $(".content").on("click", "[data-action-vote]", function () {
    var id = $(this).data('action-vote-id');
    var self = this;

    if (!$(this).hasClass('active')) {
      Services.Post.up(id, function (count) {
        $("[data-bind-vote-id='" + id + "']").html(count);
        $(self).addClass('active');
      });
    } else {
      Services.Post.down(id, function (count) {
        $("[data-bind-vote-id='" + id + "']").html(count);
        $(self).removeClass('active');
      });
    }
  })

  /**
   * Init component
   */
  $("[data-component]").each(function () {
    var component = $(this).data('component');
    if ($(this).data('component-loaded')) return
    if (Components[component]) {
      Components[component].call(this);
      $(this).data('component-loaded', true);
    }
  })
})