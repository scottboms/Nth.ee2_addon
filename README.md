Nth allows you to add a class to the nth element in a repeating set of channel entries. Wrap your `{exp:channel:entries}` tag in a `{exp:nth}` tag and use the class and interval parameters to designate the class name and nth index. In the following examples, every 3rd `<li>` tag would be affected.

####Usage Examples

    {exp:nth class="last" interval="3"}
    <ul>
      {exp:channel:entries channel="some-content"}
      <li class="{nth}">{title}</li>
      {/exp:channel:entries}
    </ul>
    {/exp:nth}

Alternatively, the output class can be set in the `{exp:nth}` tag's class attribute.

    {exp:nth class=' class="last"' interval="3"}
    <ul>
      {exp:channel:entries channel="some-content"}
      <li {nth}>{title}</li>
      {/exp:channel:entries}
    </ul>
    {/exp:nth}

####Version History and Change Log

1.0.0 (2011-05-18) Initial release
1.0.1 (2011-05-19) Documentation updates and improvements
